<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Edit customer</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">

        <!-- Template CSS -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/components.css">

    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-5">
                            <?php if (isset($customer) && !empty($customer)): ?>
                                <form method="post" action="/update" novalidate="">
                                    <input type="hidden" name="id" value="<?= $customer->id ?>">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Customer Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Full name *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user-edit"></i>
                                                        </div>
                                                    </div>
                                                    <input value="<?= old('full_name', $customer->full_name)?>"
                                                           type="text"
                                                           name="full_name"
                                                           class="form-control <?= (isset($_SESSION['error']['full_name']) ? " is-invalid" : "") ?>"
                                                           tabindex="1"
                                                           required>
                                                    <?php if (isset($_SESSION['error']['full_name'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= $_SESSION['error']['full_name'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input value="<?= old('email', $customer->email) ?>" type="email"
                                                           name="email"
                                                           class="form-control <?= (isset($_SESSION['error']['email']) ? " is-invalid" : "") ?>"
                                                           tabindex="2"
                                                           required>
                                                    <?php if (isset($_SESSION['error']['email'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= $_SESSION['error']['email'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>CPF *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-address-card"></i>
                                                        </div>
                                                    </div>
                                                    <input value="<?= old('cpf', $customer->cpf)?>" type="text"
                                                           name="cpf"
                                                           class="cpf form-control <?= (isset($_SESSION['error']['cpf']) ? " is-invalid" : "") ?>"
                                                           tabindex="3"
                                                           required>
                                                    <?php if (isset($_SESSION['error']['cpf'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= $_SESSION['error']['cpf'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone number </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input value="<?= old('phone', $customer->phone) ?>" type="text"
                                                           name="phone"
                                                           class="form-control phone-number"
                                                           tabindex="4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-row justify-content-between">
                                                <div class="form-group col-12 col-lg-4">
                                                    <a href="/" class="btn btn-danger btn-lg btn-block"
                                                       tabindex="6">
                                                        Cancel
                                                    </a>
                                                </div>
                                                <div class="form-group col-12 col-lg-4">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg btn-block"
                                                            tabindex="5">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
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
        <script src="/assets/js/stisla.js"></script>

        <!-- JS Libraies -->
        <script src="/assets/modules/izitoast/js/iziToast.min.js"></script>

        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        <script src="/assets/js/scripts.js"></script>
        <script src="/assets/js/custom.js"></script>
        <?php include_once "messages.php" ?>
    </body>
</html>
