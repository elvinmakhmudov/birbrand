import VueRouter from 'vue-router';

var routes = [
    {
        path: '/',
        component: require('./views/Home')
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
        path: '/subcategory',
        component: require('./views/Subcategory')
    }
];
export default new VueRouter({
    routes
});
