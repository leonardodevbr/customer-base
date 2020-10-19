<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>All customers</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
        <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/assets/modules/datatables/Select-1.3.1/css/select.bootstrap4.min.css">
        <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
        <link rel="stylesheet" href="/assets/modules/jquery-confirm/jquery-confirm.min.css">

        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/AutoFill-2.3.5/css/autoFill.bootstrap4.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/Buttons-1.6.3/css/buttons.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/ColReorder-1.5.2/css/colReorder.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/FixedColumns-3.3.1/css/fixedColumns.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/FixedHeader-3.1.7/css/fixedHeader.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/KeyTable-2.5.2/css/keyTable.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/Responsive-2.2.5/css/responsive.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/RowGroup-1.1.2/css/rowGroup.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/RowReorder-1.2.7/css/rowReorder.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/Scroller-2.0.2/css/scroller.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/SearchPanes-1.1.1/css/searchPanes.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css"
              href="/assets/modules/datatables/Select-1.3.1/css/select.bootstrap4.min.css"/>

        <!-- Template CSS -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/components.css">

    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All customers</h4>
                                    <a href="/create" class="ml-auto btn btn-primary" data-toggle="tooltip"
                                       data-title="Add new customer">
                                        <i class="fa fa-user-plus"></i>
                                        Add new customer
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <?php if (!empty($customers)): ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            #
                                                        </th>
                                                        <th>Full name</th>
                                                        <th>E-mail</th>
                                                        <th>CPF</th>
                                                        <th>Phone</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($customers) && !empty($customers)): ?>
                                                        <?php foreach ($customers as $customer): ?>
                                                            <tr>
                                                                <td><?= $customer->id ?></td>
                                                                <td><?= $customer->full_name ?></td>
                                                                <td>
                                                                    <a href="mailto:<?= $customer->email ?>"><?= $customer->email ?></a>
                                                                </td>
                                                                <td><?= $customer->cpf ?></td>
                                                                <td>
                                                                    <a href="callto:+55<?= $customer->phone ?>"><?= $customer->phone ?></a>
                                                                </td>
                                                                <td>
                                                                    <a href="/edit/<?= $customer->id ?>"
                                                                       class="btn btn-primary"
                                                                       data-toggle="tooltip" data-title="Edit">
                                                                        <i class="fa fa-user-edit"></i>
                                                                    </a>
                                                                    <form method="post"
                                                                          action="/delete/<?= $customer->id ?>"
                                                                          class="d-inline pull-left delete_button_form">
                                                                        <a class="btn btn-danger btn-action confirm-plugin"
                                                                           data-toggle="tooltip" data-title="Delete"
                                                                           data-message="You sure wants delete this customer"
                                                                           title="Delete"><i
                                                                                    class="fas fa-trash"></i></a>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else: ?>
                                    <h3>There are no customer records yet.</h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="/assets/modules/jquery.min.js"></script>
        <script src="/assets/modules/cleave-js/dist/cleave.min.js"></script>
        <script src="/assets/modules/cleave-js/dist/addons/cleave-phone.br.js"></script>
        <script src="/assets/modules/popper.js"></script>
        <script src="/assets/modules/tooltip.js"></script>
        <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="/assets/modules/moment.min.js"></script>
        <script src="/assets/modules/jquery-confirm/jquery-confirm.min.js"></script>
        <script src="/assets/js/stisla.js"></script>


        <!-- JS Libraies -->
        <script type="text/javascript" src="/assets/modules/datatables/JSZip-2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="/assets/modules/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="/assets/modules/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/AutoFill-2.3.5/js/dataTables.autoFill.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/AutoFill-2.3.5/js/autoFill.bootstrap4.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/Buttons-1.6.3/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/Buttons-1.6.3/js/buttons.bootstrap4.min.js"></script>
        <script type="text/javascript" src="/assets/modules/datatables/Buttons-1.6.3/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="/assets/modules/datatables/Buttons-1.6.3/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="/assets/modules/datatables/Buttons-1.6.3/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="/assets/modules/datatables/Buttons-1.6.3/js/buttons.print.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/ColReorder-1.5.2/js/dataTables.colReorder.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/FixedColumns-3.3.1/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/FixedHeader-3.1.7/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/KeyTable-2.5.2/js/dataTables.keyTable.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/Responsive-2.2.5/js/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/RowGroup-1.1.2/js/dataTables.rowGroup.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/RowReorder-1.2.7/js/dataTables.rowReorder.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/Scroller-2.0.2/js/dataTables.scroller.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/SearchPanes-1.1.1/js/dataTables.searchPanes.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/SearchPanes-1.1.1/js/searchPanes.bootstrap4.min.js"></script>
        <script type="text/javascript"
                src="/assets/modules/datatables/Select-1.3.1/js/dataTables.select.min.js"></script>
        <script src="/assets/modules/izitoast/js/iziToast.min.js"></script>


        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        <script src="/assets/js/scripts.js"></script>
        <script src="/assets/js/custom.js"></script>
        <?php include_once "messages.php" ?>
    </body>
</html>
