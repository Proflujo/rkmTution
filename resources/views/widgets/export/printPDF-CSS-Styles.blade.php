<style type="text/css">
	.fs-small, .fs-small *:not(h6)
	{
		font-size: 12.5px !important;
	}

	.panelPrintContent
	{
		width: calc(100% - 20mm);
		margin: auto;
	}

	.panelPrintContent > table
	{
		width: 100%;
		table-layout: fixed;
		border-collapse: collapse;
	}

	.panelPrintContent table td
	{
		font-size: 14px;
	}

	.panelPrintContent table td[colspan="2"]
	{
		width: 50%;
	}

	table.inner-border
	{
		border: 0;
		border-collapse: collapse;
	}

	table.inner-border td
	{
		border: 1px solid;
	}

	table.inner-border tr:first-child td
	{
		border-top: 0;
	}

	table.inner-border tr:last-child td
	{
		border-bottom: 0;
	}

	table.inner-border tr td:first-child
	{
		border-left: 0;
	}

	table.inner-border tr td:last-child
	{
		border-right: 0;
	}

	.padding-0
	{
		padding: 0 !important;
	}

	.child-padding-0 *
	{
		padding: 0 !important;
	}

	.padding-10
	{
		padding: 11px !important;
	}

	.padding-h-10
	{
		padding: 0 11px 0 11px !important;
	}

	.td-padding-v-5 td
	{
		padding-top: 6px !important;
		padding-bottom: 6px !important;
	}

	.td-padding-h-10 td
	{
		padding-left: 11px !important;
		padding-right: 11px !important;
	}

	.border-0
	{
		border: 0;
	}

	.border-top-0
	{
		border-top: 0;
	}

	.border-bottom-0
	{
		border-bottom: 0;
	}

	.border-x-0
	{
		border-left: 0;
		border-right: 0;
	}

	.border-y-0
	{
		border-top: 0;
		border-bottom: 0;
	}

	.width-100
	{
		width: 100%;
	}

	.v-align-top
	{
		vertical-align: top;
	}

	td
	{
		white-space: normal !important;
		word-wrap: break-word !important;
		word-break: break-all !important;
		hyphens: auto !important;
	}
</style>

<style type="text/css" id="tripSheetPrintStyle" media="max-width: 1px">
	@media print
	{
		@page
		{
			size: auto;
			margin: 0;
		}

		/* Hide all elements other than the print panel */
		body *
		{
			visibility: hidden;
		}

		.panelPrintContent, .panelPrintContent *
		{
			visibility: visible;
		}

		.panelPrintContent
		{
			position: fixed;
			top: 0;
			left: 0;
			margin: 10mm;
			display: block !important;
		}
	}
</style>