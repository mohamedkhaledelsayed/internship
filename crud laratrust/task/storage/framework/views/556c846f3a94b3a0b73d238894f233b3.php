<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Add Font Awesome CSS link here -->
<header class="header">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.navbar-item {
    text-decoration: none;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.navbar-list {
    list-style: none;
    display: flex;
    gap: 20px;
    align-items: center; 
}
.nacbar-item:hover {
    background-color: white;
  }


.search-form {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

.search-input {
    border: none;
    padding: 6px;
    border-radius: 5px;
    font-size: 14px;
}

.search-button {
    border: none;
    background-color: transparent;
    color: white;
    cursor: pointer;
    font-size: 18px;
    margin-left: 5px;
}

.search-button:hover {
    color: #f0f0f0;
}

.navbar-item.logout {
    margin-left: auto; 
}

    </style>
    <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="<?php echo e(route('aboutUs')); ?>" class="navbar-item">About Us</a></li>
            <li><a href="<?php echo e(route('home')); ?>" class="navbar-item">Home</a></li>
            <?php if(auth()->guard()->guest()): ?>
                <li><a href="<?php echo e(route('login')); ?>" class="navbar-item">Login</a></li>
                <a href="<?php echo e(route('register')); ?>" class="navbar-item">Register</a>
            <?php else: ?>
            <li><a href="<?php echo e(route('profile', Auth::user()->id)); ?>" class="navbar-item">Profile</a></li>
            <li>
                    <form action="<?php echo e(route('products.search')); ?>" method="GET" class="search-form">
                        <input type="text" name="query" class="search-input" placeholder="Search products...">
                        <button type="submit" class="search-button">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </li>
            <li><a href="<?php echo e(route('cart.index')); ?>"class="navbar-item">My Cart</a></li>    
            <?php if( Auth::user()->type == 'admin'): ?>
                <li> admin</li>
                <li><a href="<?php echo e(route('edit')); ?>" class="navbar-item">Edit</a></li>
                <?php endif; ?>

                <li class="navbar-item logout">
                    <a href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
>
                       <i class="fa fa-sign-out-alt fa-2x">Logout</i>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header><?php /**PATH D:\tasks\task\elkashir\resources\views/bar.blade.php ENDPATH**/ ?>