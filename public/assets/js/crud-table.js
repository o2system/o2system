jQuery( document ).ready( function ( $ ) {

	$( ".chosen-select" ).chosen( {
		                              disable_search : true
	                              } );

	var iTableForm = $('[data-form="table-list-form"]');

	iTableForm.bind('load', function (e, params) {
		console.log(params.segments);
		// $.yb.apiRequest({
		//     segment: params.segments,
		//     method: params.method,
		//     data: params.data,
		//     // track: false,
		// }, function (response) {
		//     if (response.status.success == true) {
		//         var tr = $('body').find('[data-pattern="table-row"]');
		//         var trClone = tr.clone();
		//         var tBody = tr.parent();
		//         tBody.empty();
		//         tBody.append(trClone);
		//         $.o2system.Helper.callFunction('yubi.loadTable', response);
		//     }
		// });
	});

	iTableForm.find('[data-action="table-filter-toggle"]').on('click', function (e) {
		if ($('[data-role="table-filter"]').hasClass('hidden')) {
			$('[data-role="table-filter"]').removeClass('hidden');
		} else {
			$('[data-role="table-filter"]').addClass('hidden');
		}
	});

	iTableForm.on('click', '[data-action="table-filter-reset"]', function () {
		iTableForm.find('tbody > tr').show();
		iTableForm.find("input[type=text], textarea").val("");
	});

	iTableForm.on('click', '[data-action="table-filter-reload"]', function () {
		window.location.href = $.o2system.URL.Current();
	});

	iTableForm.on('keyup', '[data-action="col-filter"]', function () {
		var iColumnName = $(this).attr('name');
		var iRegExp = new RegExp($(this).val(), 'i');
		iTableForm.find('tbody > tr').hide();
		iTableForm.find('tbody > tr').filter(function () {
			return iRegExp.test($(this).find('.col-tbody-' + iColumnName).text());
		}).show();
	});

	iTableForm.on('click', '[data-action="item-checkboxes"]', function (e) {
		$(this).parents('table').find('tbody').find('tr').not('tr.hidden').find(':checkbox').prop('checked', this.checked);
	});

	// iTableForm.on('click', '[data-action="edit"]', function () {
	//     var iEditURL = $.o2system.URL.Current('edit/');
	//     var iDataID = $(this).closest('tr').data('id');
	//     window.location.href = iEditURL + iDataID;
	// });

	//==================================================================================================================
	//==================================================================================================================
	//==================================================================================================================


	$('[data-action="toolbar-add-new"]').click(function () {
		window.location.href = $.URL.Current + '/add-new';
	});

	$( '[data-action="toolbar-edit"]' ).click( function () {
		var iEditURL = $.o2system.URL.Current( 'edit' );

		if ( $( 'tr.selected' ).length == 1 ) {
			var iDataID = $( 'tr.selected' ).data( 'id' );
			window.location.href = iEditURL + iDataID;
		} else {
			toastr.error( 'Please select one row' );
		}
	} );

	$( '[data-action="toolbar-delete"]' ).click( function () {
		window.location.href = $.o2system.URL.Current( 'delete' );
	} );

	$( '[data-action="toolbar-publish"]' ).click( function () {
		window.location.href = $.o2system.URL.Current( 'publish' );
	} );

	$( '[data-action="toolbar-publish"]' ).click( function () {
		window.location.href = $.o2system.URL.Current( 'publish' );
	} );

	$( '[data-action="toolbar-archive"]' ).click( function () {
		window.location.href = $.o2system.URL.Current() + '/?status=ARCHIVE';
	} );

	$( '[data-action="toolbar-help"]' ).click( function () {
		window.location.href = $.o2system.URL.Current( 'help' );
	} );

	if ( $.o2system.Server.QUERY_STRING !== '' ) {
		$( '[data-role="table-filter"]' ).removeClass( 'hidden' );
	}

	iTableForm.on( 'change' , '[data-action="table-filter-entries"]' , function () {
		iTableForm.submit();
	} );

	iTableForm.on( 'change' , '[data-action="table-filter-status"]' , function () {
		iTableForm.submit();
	} );

	// iTableForm.on('click', '[data-action="table-filter-toggle"]', function (event) {
	//     event.preventDefault();
	//     if ($('[data-role="table-filter"]').hasClass('hidden')) {
	//         $('[data-role="table-filter"]').slideDown('slow', function () {
	//             $(this).removeClass('hidden');
	//         });
	//     } else {
	//         $('[data-role="table-filter"]').slideUp('slow', function () {
	//             $(this).addClass('hidden');
	//         });
	//     }
	// });

	// iTableForm.on('click', '[data-action="table-filter-reset"]', function () {
	//     iTableForm.find('tbody > tr').show();
	// });
	//
	// iTableForm.on('click', '[data-action="table-filter-reload"]', function () {
	//     window.location.href = $.URL.Current;
	// });


	// iTableForm.on('keyup', '[data-action="col-filter"]', function () {
	//     var iColumnName = $(this).attr('name');
	//     var iRegExp = new RegExp($(this).val(), 'i');
	//     iTableForm.find('tbody > tr').hide();
	//     iTableForm.find('tbody > tr').filter(function () {
	//         return iRegExp.test($(this).find('.col-tbody-' + iColumnName).text());
	//     }).show();
	// });
	//
	// iTableForm.on('change', '[data-action="col-filter"]', function () {
	//     var iColumnName = $(this).attr('name');
	//     var iRegExp = new RegExp($(this).val(), 'i');
	//     iTableForm.find('tbody > tr').hide();
	//     iTableForm.find('tbody > tr').filter(function () {
	//         return iRegExp.test($(this).find('.col-tbody-' + iColumnName).text());
	//     }).show();
	// });

	// iTableForm.on('change', '[data-action="item-checkboxes"]', function () {
	//     if ($(this).prop('checked') == true) {
	//         $(this).prop('checked', true);
	//         $('[data-action="item-checkbox"]').each(function () {
	//             $(this).prop('checked', true);
	//             $(this).closest('tr').addClass('selected');
	//         });
	//     } else {
	//         $(this).prop('checked', false);
	//         $('[data-action="item-checkbox"]').each(function () {
	//             $(this).prop('checked', false);
	//             $(this).closest('tr').removeClass('selected');
	//         });
	//     }
	// });
	//
	// iTableForm.on('change', '[data-action="item-checkbox"]', function () {
	//     if ($(this).prop('checked') == true) {
	//         $(this).prop('checked', true);
	//         $(this).closest('tr').addClass('selected');
	//     } else {
	//         $(this).prop('checked', false);
	//         $(this).closest('tr').removeClass('selected');
	//     }
	// });

	// iTableForm.on('click', '[data-action="item-edit"]', function () {
	//     var iEditURL = $.URL.Current + '/edit/';
	//     var iDataID = $(this).closest('tr').data('id');
	//
	//     window.location.href = iEditURL + iDataID;
	// });

	iTableForm.on('click', '[data-action="item-delete"]', function () {
		var iDeleteURL = $.URL.Current + '/delete';
		var iConfirmText = $(this).data('confirm');
		var iRow = $(this).closest('tr');
		var iDataID = iRow.data('id');

		bootbox.confirm( iConfirmText , function ( confirm ) {
			if ( confirm == true ) {
				Pace.track( function () {
					$.post( iDeleteURL , { id : iDataID } , function ( response ) {
						if ( response.success == true ) {
							iRow.slideUp( 'slow' , function () {
								iRow.remove();
							} );

							toastr.success( response.message );
						} else {
							toastr.error( response.message );
						}
					} , 'json' );
				} );
			}
		} );
	} );
} );
