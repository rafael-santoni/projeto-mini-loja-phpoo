<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="author" content="Rafel Santoni" />
    <meta name="keywords" content="Loja Vitural, Mini Loja, HTML, CSS, JavaScript, PHP, OO">
    <meta name="description" content="Mini Loja Virtual desenvolvida durante estudos sobre PHPOO" />

    <meta property="og:title" content="Mini Loja Virtual" />
    <meta property="og:description" content="Mini Loja Virtual desenvolvida durante estudos sobre PHPOO" />
    <meta property="og:url" content="https://rafasantoni.heliohost.us/mini-loja/" />
    <meta property="og:image" content="https://ahrefs.com/blog/wp-content/uploads/2019/12/fb-how-to-become-an-seo-expert.png" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="pt_BR" />

    <title>Mini Loja - RS-Dev</title>

    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" /> -->
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/120/shop.png" />
    
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />

</head>
<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?= $this->insert('partials/nav'); ?>
    </nav>

    <!-- Header-->
    <!-- <header class="bg-dark py-5">
        <?php // $this->insert('partials/header'); ?>
    </header> -->

    <!-- Section-->
    <section class="py-5">
        <?= $this->section('content'); ?>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <?= $this->insert('partials/footer'); ?>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>