
var $base_url = $("#base_url").val();

function load_datatable(table_id, path, scrollX){

	var scrollX = scrollX || "",
		modal = modal || false,
		order = (table_id == 'audit_log_table') ? 3 : 0;
		
	
	var table = {
		table_id : function(){ 
	
			$("#"+table_id).dataTable(
				{
					"bDestroy": true,
					"bProcessing": true,
					"bServerSide": true,
					//"bPaginate": false,
					"sPaginationType": "full_numbers",
					"scrollX": scrollX,
					"fixedColumns": {
						"leftColumns": 1,
						//"rightColumns": 1
					},
					"sAjaxSource": $base_url + path, 
					"order": [[ order, "asc" ]],
					"fnServerData": function ( sSource, aoData, fnCallback ) {
						$.ajax( {
							"dataType": 'json', 
							"type": "POST", 
							"url": sSource, 
							"data": aoData, 
							"success": function(result) {
								
								if(result.flag == 0)
								{
									notification_msg("ERROR", result.msg);		
								}
								
								fnCallback(result);
							}
						} );	
					},
					/* START: Doc's code */
					fnDrawCallback : function(){
						if( $( '.tooltipped' ).length !== 0 )
						{
							$('.tooltipped').tooltip({delay: 50});
						}
						if( ModalEffects !== undefined && $( '.md-trigger' ).length !== 0 )
						{
							ModalEffects.re_init();
						}
						
					},
					/* END: Doc's code */
					columnDefs: [
						{ orderable: false, targets: -1 }
					]
				}
			);
		}
	}

	table.table_id();
}