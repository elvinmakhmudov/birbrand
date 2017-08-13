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
        component: require('./views/Order'),
    },
];


export default new VueRouter({
    routes
});
