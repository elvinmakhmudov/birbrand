import VueRouter from 'vue-router';

var routes = [
    {
        path: '/',
        component: require('./views/Home'),

    },
    {
        path: '/login',
        component: require('./views/Login')
    },
    {
        path: '/register',
        component: require('./views/Register')
    },
    {
        path: '/category/:slug',
        component: require('./views/Category'),
        props: true
    },
    {
        path: '/product/:product_id',
        component: require('./views/Product'),
        props: true
    },
    {
        path: '/profile',
        component: require('./views/Profile'),
    },
    {
        path: '/order',
        name: 'myorder',
        meta: { keepAlive: false },
        component: require('./views/Order'),
    },
    {
        path: '/about',
        component: require('./views/About'),
    },
    {
        path: '/cart',
        component: require('./views/Shopping-cart'),
    },
];


export default new VueRouter({
    routes
});
