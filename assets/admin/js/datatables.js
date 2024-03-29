// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });

  $('#productTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: [[4, 'desc']]
  });
});
