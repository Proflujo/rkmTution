@if(isset($dataTableIds))
	<div class="dataTable_search_container float-right">
		<input type="text" class="form-control dataTable_searchTextBox" id="dataTable_searchTextBox" data-table-id="{{ $dataTableIds }}" placeholder="Search here" />
		<a href="javascript:void(0);" class="dataTable_search_cleat_btn hide">
			<i class="fa fa-times-circle"></i>
		</a>
	</div>

	<script type="text/javascript">
		$(document).on('focus', '.dataTable_searchTextBox', function(){
			$(this).select();
		});

		$(document).on('keyup', '.dataTable_searchTextBox', function(){
			var tableIds = $(this).attr('data-table-id').split(',');
			var searchInput = $(this).val();

			toggleClearBtn($(this));

			$.each(tableIds, function(index, id){
				var tableId = '#'+id;
				if($(tableId).is(':visible')){
					var dataTable = $(tableId).DataTable();
					dataTable.search(searchInput).draw();
				}
			});
		});

		$(document).on('click', '.dataTable_search_cleat_btn', function(e){
			e.preventDefault();
			var searchBox = $(this).parent().children('.dataTable_searchTextBox');
			searchBox.val('').trigger('keyup');
			searchBox.focus();
		});

		function toggleClearBtn(searchBox)
		{
			var btn = searchBox.parent().children('.dataTable_search_cleat_btn');
			if(searchBox.val()){
				btn.removeClass('hide');
			}else{
				btn.addClass('hide');
			}
		}
	</script>
@endif
