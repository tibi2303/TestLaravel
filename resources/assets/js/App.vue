<template>
    <div class="root">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <router-link to="/" class="navbar-brand">Navbar</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <router-link to="/" class="nav-link">Home <span class="sr-only">(current)</span></router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link" href="#">Users</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/admins" class="nav-link" href="#">Pricing</router-link>
                        </li>
                    </ul>
                </div>
            </nav>
            <transition>
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>