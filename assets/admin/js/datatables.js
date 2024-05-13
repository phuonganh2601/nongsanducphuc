// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });

  $('#categoryTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });

  $('#productTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });

  $('#userTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });

  $('#evaluationsTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });

  $('#orderTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    },
    order: [[4, 'asc']]
  });

  $('#orderDetailTable').DataTable({
    "language": {
      url: '../../assets/admin/js/datatables.vi.json',
    }
  });
});