<div class="container px-4 px-lg-5">

    <a class="navbar-brand" href="#!">Mini Loja - RS-Dev</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

            <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
            
            <li class="nav-item"><a class="nav-link" href="/cart">Cart</a></li>

            <li class="nav-item">
                <?php if($instances['auth']::isAuth()): ?>
                    <a class="nav-link">Bem vindo, <?= $instances['auth']::auth()->fullName; ?></a>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">Logout</a>
                    </li>
                <?php else: ?>
                    <a class="nav-link" href="/login">Login</a>
                <?php endif; ?>
            </li>
            
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">All Products</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                    <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                </ul>
            </li> -->

        </ul>
        
        <form class="d-flex">
            <button class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    <?= $instances['cart']::getTotalProductsInCart(); ?>
                </span>
            </button>
        </form>
        
    </div>

</div>