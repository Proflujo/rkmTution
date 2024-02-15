window.removeDuplicateReq = function (url) {
	window.ajaxRequests = typeof(window.ajaxRequests) == 'undefined' ? {} : window.ajaxRequests;

	if(typeof(window.ajaxRequests[url]) != 'undefined' && window.ajaxRequests[url]) {
		window.ajaxRequests[url].abort('manualAbort');
	}
}

window.addToReqQueue = function(url, req) {
	window.ajaxRequests[url] = req;
}

window.sendAjaxRequest = function( url, type, callback, params = '', targetElement = false, fileUpload = false) {
	try {
		removeDuplicateReq(url);

		if(targetElement) {
			targetElement.addClass('is-loading');
		}

		let shouldEncodeAsJSON = false;

		if(type == 'GET') {
			if(typeof(params) == 'object') {
				shouldEncodeAsJSON = true;
				var formattedParams = '';

				$.each(params, (k, v) => {
					if(formattedParams.length > 0) {
						formattedParams += '&';
					}

					formattedParams += `${k}=${v}`;
				});
			}
		}

		if(!fileUpload && shouldEncodeAsJSON) {
			if( params != "" ) {
				params = JSON.stringify(params);
			}
		}

		var req = $.ajax({
			beforeSend: (xhr) => {
				if(!fileUpload) {
					xhr.setRequestHeader('Content-Type', 'application/json');
				}
			},
			url: url,
			type: type,
			data: (typeof(formattedParams) != 'undefined' ? formattedParams : params),
			dataType: 'json',
	    	processData: false,
	    	contentType: fileUpload ? false : 'application/json',
			async: true,
	    	cache : false,
			success: callback,
		});

		addToReqQueue(url, req);

		req.done(function(response) {
		   if(targetElement) {
		    	targetElement.removeClass('is-loading');
		   }
		}).fail(function (jqXHR, message){
		   if(targetElement) {
		    	targetElement.removeClass('is-loading');
		   }

		   if(jqXHR.status === 0 && fileUpload) {
		   	callback(jqXHR.responseJSON ?? { 'success': false, 'uploadedFileInvalid': true });
		   } else {
		   	callback(jqXHR.responseJSON ?? {});
		   }
		});
	} catch(err) {
		console.log('Error occurred while trying to Send AJAX request:');
		console.log(err);
	}
}

window.session = {
	get: function (name) {
		return sessionStorage.getItem(name);
	},
	set: function (name, value) {
		return sessionStorage.setItem(name, value);
	},
	remove: function (name) {
		return sessionStorage.removeItem(name);
	},
	clear: function () {
		return sessionStorage.clear();
	},
};

window.cookie = {
	get: function (name) {
		return localStorage.getItem(name);
	},
	set: function (name, value) {
		return localStorage.setItem(name, value);
	},
	remove: function (name) {
		return localStorage.removeItem(name);
	},
	clear: function () {
		return localStorage.clear();
	},
};

window.showValidationMessages = function (form, messages, replace = {}) {
	$.each(Object.keys(messages), (i, key) => {
		var field = form.find('#' + (replace[key] ?? key));
		var message = messages[key][0] ?? messages[key];

		field.attr('aria-invalid', true);
		field.attr('aria-describedBy', message);
		field.addClass('is-invalid');

		field.closest('div').append('<span class="invalid-feedback">' + message + '</span>');
	});
};

window.hideValidationMessages = function (form) {
	form.find('.is-invalid').removeAttr('aria-invalid').removeAttr('aria-describedBy').removeClass('is-invalid');
	form.find('.invalid-feedback').remove();
};

$(document).on('input','.custom-datatable .dt-search', function(){
	searchDT($(this));
});

function searchDT(txtDTSearch) {
	var table = txtDTSearch.closest('.custom-datatable').find('.dataTable');
	console.log(table);
	var dataType = table.DataTable();
	dataType.search(txtDTSearch.val() ?? '').draw();
}

function createDataTable( url, tableName, processData, initialize, order = [], colDef = [], filterCriteriaData=[], footerCallback=[], setWidgets = []) {
	searchData = {};
	if( $.isFunction( filterCriteriaData ) ){
		var	searchData	=	filterCriteriaData();
	}

	var tableWidgets = ["info","paging","searching","ordering","lengthChange"];

	var footer = true;
	if( !$.isFunction( footerCallback ) ){
		footerCallback	=	function() {};
		footer = false;
	}

	var table = $(tableName);
	var parent = table.closest('.tbl-parent');
		parent = parent.length > 0 ? parent : table.parent();

	parent.addClass('is-loading');

	let renderDT = function(data) {
		parent.removeClass('is-loading');

		$.each(tableWidgets,function(index,value){
			window[value] = true;

			if(value == "searching"){
				if(setWidgets.hasOwnProperty(value) != true)
					window[value] = false;
			}

			if( setWidgets.hasOwnProperty(value) === true){
				window[value] = setWidgets[value];
			}
		});

		if( $.isFunction( processData ) ){
			data = processData(data);
		}

		//Check if table has thead element
		thead = $(tableName+">thead");
		if (thead.length===0){  //if there is no thead element, add one.
			$("<thead></thead>").appendTo($(tableName));
			if(footer)
				$("<tfoot></tfoot>").appendTo($(tableName));
		}

		//Check if table thead has atleast one tr element
		tr = $(tableName+'>thead>tr');
		if (tr.length===0){  //if there is no tr element, add one.
			$("<tr></tr>").appendTo($(tableName+">thead"));
			if(footer)
				$("<tr></tr>").appendTo($(tableName+">tfoot"));
		}

		// Iterate each column and print table headers for Datatables
		head = "",foot = "";
		$.each(data.columns, function (k, colObj) {
			head += '<th>' + colObj.name + '</th>';
			if(footer)
				foot += '<th></th>';
		});

		$(tableName+'>thead>tr').html(head);
		if(footer)
			$(tableName+'>tfoot>tr').html(foot);

		//Recreate datatable
		if ( $.fn.DataTable.isDataTable( tableName ) ) {
			// $(tableName).DataTable().destroy();
			$(tableName).empty();
		}

		dynamicDataTable = $(tableName).DataTable({
								"dom": "lfr<\"table-responsive\"t>pi",
								"destroy": true,
								"data": data.data,
								/* Enable other widgets */
								"info": info,
								"paging": paging,
								"ordering": ordering,
								"searching": searching,
								"lengthChange":lengthChange,
								"columns": data.columns,
								"fnInitComplete": function () {
									// Event handler to be fired when rendering is complete
									if( $.isFunction( initialize ) ){
										initialize();
									}
								},
								order: order,
								columnDefs: colDef,
								footerCallback: footerCallback,
							});

		if($("#dataTable_searchTextBox").val() !="") {
			$("#dataTable_searchTextBox").trigger("keyup");
		}

		return dynamicDataTable;
	};

	if(typeof(url) == 'object') {
		renderDT(url);
	} else {
		request = $.ajax({
					url: url,
					method: "GET",
					dataType: "json",
					async: true,
					data	: searchData
				  });

		removeDuplicateReq(url);

		addToReqQueue(url, request);

		request.done(function (data) {
			renderDT(data);
		})

		request.fail(function (jqXHR, exception) {
			parent.removeClass('is-loading');

			var msg = 'Failed';
			if (jqXHR.status === 0) {
				msg = 'Not connect: Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error:' + jqXHR.responseText;
			}
		});
	}
}

const AppDateFormats = {
	'date': 'DD-MM-YYYY',
	'time': 'hh:mm A',
	'dateTime': 'DD-MM-YYYY hh:mm A',
};

$.fn.extend({
	makeDatePicker: function() {
		if($.isFunction($.fn.daterangepicker)) {
			this.each(function() {
				const thisYear = new Date().getFullYear();
				let options = {
					locale: {
						format: AppDateFormats.date,
					},
					autoUpdateInput: false,
					singleDatePicker: true,
					showDropdowns: true,
					minYear: (thisYear - 60),
				};

				if($(this).is('.datetimepicker')) {
					options.locale.format = AppDateFormats.dateTime;
					options['timePicker'] = true;
				} else if($(this).is('.timepicker')) {
					options.locale.format = AppDateFormats.time;
					options['timePicker'] = true;
				}

				if(!$(this).is('.future-date')) {
					options['maxDate'] = new Date();
				}

				$(this).daterangepicker(options);
				$(this).attr('readonly', true);
				$(this).on('apply.daterangepicker', function(e, picker) {
					$(this).val(picker.startDate.format(options.locale.format)).trigger('change');
				});

				if($(this).is('.timepicker')) {
					$(this).on('show.daterangepicker', function(e, picker) {
						picker.container.find('.calendar-table').hide();
					});
				}
			});
		}

		return $(this);
	},
	makeSelectPicker: function() {
		if($.isFunction($.fn.select2)) {
			$(this).each(function() {
				var element = $(this);
				let options = {
					allowClear: false,
					closeOnSelect: true,
					placeholder: '',
				};

				if(element.attr('placeholder')) {
					options['placeholder'] = element.attr('placeholder');
				}

				if(element.is('.server-side')) {
					options['ajax'] = {
						url: element.attr('data-url'),
						async: true,
						delay: 250,
						data: (params) => {
							let query = {
								search: params.term,
								page: params.page ?? 1,
							};

							if(typeof(element.prop('ajaxParams')) != 'undefined') {
								$.each(element.prop('ajaxParams'), (k, v) => {
									query[k] = v;
								});
							}

							return query;
						},
						transport: function (params, success, failure) {
							var $request = $.ajax(params);

							$request.then(success);
							$request.fail(failure);

							return $request;
						},
					};
				}

				if(options['placeholder']) {
					options['allowClear'] = true;
				}

				element.select2(options);

				if(element.attr('data-default-value')) {
					element.val(element.attr('data-default-value') ?? '').trigger('change');
					element.removeAttr('data-default-value');
				}
			});
		}

		return $(this);
	},
	makeStepper: function() {
		if(typeof(Stepper) != 'undefined') {
			$('.bs-stepper').each(function() {
				let stepHeaderElement = $(this).find('> .bs-stepper-header');
				let stepIndex = -1;

				if(stepHeaderElement && stepHeaderElement.length > 0 && stepHeaderElement.children('.active').length > 0) {
					stepHeaderElement.children('.step').each(function() {
						stepIndex++;

						if($(this).is('.active')) {
							return false;
						}
					});
				}

				let stepperInstance = new Stepper(this, {
					linear: false,
				});

				this.addEventListener('shown.bs-stepper', function(e) {
					$(this).trigger('show.stepper', [e]);
				});

				if(stepIndex > -1) {
					stepperInstance.to(stepIndex + 1);
				}

				$(this).prop('stepperInstance', stepperInstance);
			});
		}
	},
});

function generateUniqueRandomId(prefix) {
	let randomNumber = Math.ceil(Math.random() * 10000);
	let randomId = `${prefix}-${randomNumber}`;

	if($(`#${randomId}`).length > 0) {
		return generateUniqueRandomId(prefix);
	}

	return randomId;
}

window.toast = function(title, content, icon = 'none', targetParent = 'body') {
	try {
		let alertClass = 'alert-success';

		switch(icon) {
			case 'error':
			case 'failure':
				icon = 'fa fa-exclamation-triangle';
				alertClass = 'alert-danger';
				break;
			case 'success':
				icon = 'fa fa-check';
				break;
			default:
				icon = null;
		}

		title = (title && title.length > 0 ? title : appTitle);

		let toastId = generateUniqueRandomId('toast');
		let toastHTML =	`<div class="alert ${alertClass} toastMsg" id="${toastId}">`+
									`<i class="${icon}"></i>` +
									`<span>${content}</span>` +
									`<span class="toast-actions">` +
										`<a href="javascript:void(0);" class="toast-action-close" title="Close">` +
											`<i class="fas fa-times-circle"></i>` +
										`</a>` +
									`</span>` +
								`</div>`;

		$(".toastMsg").remove();

		if(targetParent == 'body') {
			if($('#layoutSidenav_content').children('.iq-card-header').length == 1) {
				$('#layoutSidenav_content').children('.iq-card-header').before(toastHTML);
			} else if($('#layoutSidenav_content').children('.page-title').length == 1) {
				$('#layoutSidenav_content').children('.page-title').before(toastHTML);
			} else if($('#layoutSidenav_content').length > 0) {
				$('#layoutSidenav_content').prepend(toastHTML);
			}
		} else {
			targetParent.prepend(toastHTML);
		}

		$('html, body').animate({
			scrollTop: 0
		}, 0, function(){});

		setTimeout(function(){
			$(`.toastMsg#${toastId}`).trigger('toast.close');
      }, 5000);
	} catch(err) {
		console.error('Toast error: ' + err, );
	}
};

window.showAJAXResponseMessage = function(response) {
	if(response.message) {
		toast('', response.message, (response.success ? 'success' : 'error'));
	} else if(!response.success) {
		toast('', 'Error occurred!', 'error');
	}
}

window.redirect = function(url, withMessage = null) {
	if(url.indexOf(0) == '/') {
		url = url.slice(1);
	}

	if(withMessage) {
		session.set('welcomeMsg', withMessage);
	}

	location.replace(baseUrl + '/' + url);
}


function serverSideCreateDataTable(url, tableName,columns){
	var table = $('#'+tableName).DataTable({
	    processing: true,
	    serverSide: true,
	    ajax:  url,
	    columns: columns,
	});
}

$(document).ready(function() {
	let welcomeMsg = session.get('welcomeMsg');

	if(welcomeMsg) {
		session.remove('welcomeMsg');
		toast('', session.get('welcomeMsg'));
	}

	$('.selectpicker').makeSelectPicker();
	$('.datepicker,.datetimepicker,.timepicker').makeDatePicker();

	if($('.bs-stepper').length > 0) {
		$('.bs-stepper').makeStepper();
	}
});

$(document).on('click', '.click-to-copy', function(e) {
	e.preventDefault();
	e.stopPropagation();

	var copyText = this;
	var tooltipElem = this;

	if(!$(this).is('input')) {
		if($(this).attr('target')) {
			copyText = $($(this).attr('target'))[0];
		} else if($(this).attr('data-copy-text')) {
			if($('.copy-text-panel').length == 1) {
				$('.copy-text-panel').val($(this).attr('data-copy-text'));
			} else {
				$('.copy-text-panel').remove();
				$('body').append(`<textarea class="copy-text-panel">${ $(this).attr('data-copy-text') }</textarea>`);
			}

			copyText = $('.copy-text-panel')[0];
		}
	}

	if(!$(tooltipElem).is('.copying')) {
		copyText.select();
		copyText.setSelectionRange(0, 99999);

		navigator.clipboard.writeText(copyText.value);

		let tooltipElemText = $(tooltipElem).html();

		$(tooltipElem).blur();
		$(tooltipElem).html('Copied!');
		$(tooltipElem).addClass('copying');

		setTimeout(() => {
			$(tooltipElem).html(tooltipElemText);
			$(tooltipElem).removeClass('copying');
		}, 1000);
	}
});

Object.assign(String.prototype, {
	toTitleCase() {
		
		var words = this.toLowerCase().split(/\s+/g);
	  
	  	// Loop through the array and replace the first letter with a cap
	  	var newWords = words.map(function(element){   
		    
		    // As long as we're not dealing with an empty array element, return the first letter
		    // of the word, converted to upper case and add the rest of the letters from this word.
		    // Return the final word to a new array
		    return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
  		});
  
		// Replace the original value with the updated array of capitalized words.
		return newWords.join(" "); 
	}
});

$(document).on('submit', '.confirmOnSubmit', function(e) {
	try {
		let msgText = $(this).attr('data-conf-message-text');
		let entry = $(this).attr('data-conf-message-entry');

		if(!msgText) {
			msgText = `Are you sure you want to Delete the ${(entry ?? 'Record')}?`;
		}

		return confirm(msgText);
	} catch(err) {
		console.error(err);

		e.preventDefault();
		e.stopPropagation();
		return false;
	}
});

$(document).on('change', '.custom-file-input', function() {
	let fileName = $(this).val();
	let labelElement = $(this).closest('.custom-file').children('.custom-file-label');
	let defaultText = $(this).attr('data-choose-file-label') ?? labelElement.attr('data-choose-file-label');

	if(this.files) {
		if(this.files.length > 1) {
			for(i = 0; i < this.files.length; i++) {
				if(fileName.length > 0) {
					fileName += ', ';
				}

				fileName += this.files.item(i).name;
			}
		} else if(this.files.length > 0) {
			fileName = this.files[0].name;
		}
	}

	if(isEmpty(fileName)) {
		if(isNotEmpty(defaultText)) {
			fileName = defaultText;
		} else {
			fileName = 'Choose File' + ( this.hasAttribute('multiple') ? 's' : '' );
		}
	}

	labelElement.html(fileName);
});


/* |--------------------------------------------------------------------------------
   |--------------------------------Model Functions in DataTable--------------------
   |--------------------------------------------------------------------------------
*/

function showModelWindow(title, content, footerButton = '', custWidth = '', backDrop = false, closeText = 'Close', size = '', forceMaxHeight = true){
	 alert("hi");
	closeText = closeText ? closeText : 'Close';
	footerButton += '<button type="button" class="btn btn-light" title="'+closeText+'" data-dismiss="modal">'+closeText+'</button>';
	var modalHeight = Number($(window).height()-150);
	var modalStyle = '<style>';
	modalStyle += '#modal-dialog{display: block !important;} #modal-dialog .modal-dialog{overflow-y: initial !important;} modal-lg';
	modalStyle += '#modal-dialog .modal-body{height: auto; max-height: '+modalHeight+'px; overflow-y: auto;}';
	modalStyle += '</style>';

	if(custWidth == '' && content.match(/form-control/g)){
		if(content.match(/form-control/g).length > 1){
			content = modalStyle+content;
		}
	}

	size = size == 'large' ? 'modal-lg' : (size == 'extra-large' ? 'modal-xl' : '');

	var htmlElement = '<div class="modal fade" id="modal-dialog" role="dialog"><div class="modal-dialog modal-lg '+size+' modal-dialog-centered"><div class="modal-content">';
	htmlElement += '<div class="modal-header"><h4 class="modal-title">'+title+'</h4><button type="button" class="close" title="Close" data-dismiss="modal">&times;</button>';
	htmlElement += '</div><div class="modal-body">'+content+'</div>';
	htmlElement += '<div class="modal-footer">'+footerButton;
	htmlElement += '</div></div></div></div>';

	$('body').append(htmlElement);

	if(backDrop){
		$('#modal-dialog').modal();
	}else{
		$('#modal-dialog').modal({
			backdrop: 'static',
			keyboard: false
		});
	}

	$('#modal-dialog > .modal-dialog').css({
		'width': custWidth
	});

	$('#modal-dialog').on('hidden.bs.modal', function(){
		$(this).remove();
		$('.modal-backdrop').remove();
	});

	$('#modal-dialog').on('shown.bs.modal', function(){

		if(forceMaxHeight) {
			//Set modal height based on the device width
			mHeight = $(this).find(".modal-header").height() + $(this).find(".modal-footer").height();
			sHeight = screen.height - mHeight - 220;

			cssProp = {overflow:'auto','max-height':sHeight+"px"}

			$(this).find(".modal-body").css(cssProp);
		}
	});
}

function isset(variable) {
	if(typeof(variable) != 'undefined') {
		return true;
	}

	return false;
}

function isNotEmpty(variable) {
	if(typeof(variable) != 'undefined' && variable) {
		switch(typeof(variable)) {
			case 'number':
				return (variable > 0);
				break;
			case 'object':
				return (Object.keys(variable).length > 0);
				break;
			case 'string':
				return (variable.length > 0);
				break;
			case 'boolean':
				return variable;
				break;
		}
	}

	return false;
}

function isEmpty(variable) {
	return !isNotEmpty(variable);
}

function dateObj(dateString) {
	if(dateString) {
		let dateSplit = dateString.split('-');

		if(dateSplit.length == 3) {
			return new Date(dateSplit[2], Number(dateSplit[1]) - 1, dateSplit[0]);
		}
	}

	return null;
}

function dateTimeObj(dateTimeString) {
	if(dateTimeString) {
		let dateTimeSplit = dateTimeString.split(' ');

		if(dateTimeSplit.length == 3) {
			let dateSplit = dateTimeSplit[0].split('-');
			let timeSplit = dateTimeSplit[1].split(':');
			let meridian = dateTimeSplit[2];

			if(dateSplit.length == 3 && timeSplit.length >= 2) {
				if(meridian.toLowerCase() == 'pm') {
					timeSplit[0] = Number(timeSplit[0]) + 12;
				}

				return new Date(dateSplit[2], Number(dateSplit[1]) - 1, dateSplit[0], timeSplit[0], timeSplit[1]);
			}
		}
	}

	return null;
}

function initializeStaticDT(tableName){
	let table = tableName;

	if(typeof(tableName) != 'object') {
		table = $(`#${tableName}`);
	}

	table.DataTable();
}

function objToReqStr(obj) {
	let str = '';

	$.each(obj, function(k, v) {
		if(str.length > 0) {
			str += '&';
		}

		str += `${k}=${v}`;
	});

	return str;
}

$(document).on('toast.close', '.toastMsg', function(e) {
	$(this).css('display', 'none');
	$(this).remove();
});

$(document).on('click', '.toastMsg .toast-action-close', function(e) {
	e.preventDefault();

	$(this).closest('.toastMsg').trigger('toast.close');
});


	$('.selectpicker').makeSelectPicker();
  	$('.datepicker,.datetimepicker,.timepicker').makeDatePicker();