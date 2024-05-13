// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });

  $('#categoryTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });

  $('#productTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });

  $('#userTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });

  $('#evaluationsTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });

  $('#orderTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });

  $('#orderDetailTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: []
  });
});