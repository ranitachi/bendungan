<div class="btn-group">
    <button type="button" class="btn btn-sm btn-primary">Action</button>
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
		@if ($crud->show==1)
			@if ($crud->hasAccess('show'))
				<a class="dropdown-item" href="{{ url($crud->route.'/'.$entry->getKey().'/show') }}"><i class="fa fa-eye"></i>&nbsp;&nbsp;Detail</a>
			@endif
		@endif
		@if ($crud->hasAccess('update'))
			<a class="dropdown-item" href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
		@endif
		@if ($crud->delete==1)
			@if ($crud->hasAccess('delete'))
				<a class="dropdown-item" href="javascript:void(0)" onclick="deleteEntry(this)" data-route="{{ url($crud->route.'/'.$entry->getKey()) }}" class="btn btn-sm btn-link" data-button-type="delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;{{ trans('backpack::crud.delete') }}</a>
			@endif
		@endif
    </div>
</div>

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>

	if (typeof deleteEntry != 'function') {
	  $("[data-button-type=delete]").unbind('click');

	  function deleteEntry(button) {
		// ask for confirmation before deleting an item
		// e.preventDefault();
		var button = $(button);
		var route = button.attr('data-route');
		var row = $("#crudTable a[data-route='"+route+"']").closest('tr');

		Swal.fire({
				title: 'Are you sure?',
				text: "{{ trans('backpack::crud.delete_confirm') }}",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				reverseButtons: true
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: route,
						type: 'DELETE',
						success: function(result) {
							// Show an alert with the result
							// new PNotify({
							// 	title: "{{ trans('backpack::crud.delete_confirmation_title') }}",
							// 	text: "{{ trans('backpack::crud.delete_confirmation_message') }}",
							// 	type: "success"
							// });
							Swal.fire({
								icon: 'success',
								title: "{{ trans('backpack::crud.delete_confirmation_title') }}",
								text: "{{ trans('backpack::crud.delete_confirmation_message') }}",
								showConfirmButton: false,
								timer: 1500
							});

							// Hide the modal, if any
							$('.modal').modal('hide');

							// Remove the details row, if it is open
							if (row.hasClass("shown")) {
								row.next().remove();
							}

							// Remove the row from the datatable
							row.remove();
						},
						error: function(result) {
							// Show an alert with the result
							// new PNotify({
							// 	title: "{{ trans('backpack::crud.delete_confirmation_not_title') }}",
							// 	text: "{{ trans('backpack::crud.delete_confirmation_not_message') }}",
							// 	type: "warning"
							// });
							Swal.fire({
								icon: 'success',
								title: "{{ trans('backpack::crud.delete_confirmation_not_title') }}",
								text: "{{ trans('backpack::crud.delete_confirmation_not_message') }}",
								showConfirmButton: false,
								timer: 1500
							});
						}
					});
				}
				else if (result.dismiss === 'cancel') {
					// new PNotify({
					// 	title: "{{ trans('backpack::crud.delete_confirmation_not_deleted_title') }}",
					// 	text: "{{ trans('backpack::crud.delete_confirmation_not_deleted_message') }}",
					// 	type: "info"
					// });
					Swal.fire({
						icon: 'success',
						title: "{{ trans('backpack::crud.delete_confirmation_not_deleted_title') }}",
						text: "{{ trans('backpack::crud.delete_confirmation_not_deleted_message') }}",
						showConfirmButton: false,
						timer: 1500
					});
				}
			});
      }
	}

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
@if (!request()->ajax()) @endpush @endif