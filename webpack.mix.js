let mix = require('laravel-mix');
let webpack = require('webpack');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.webpackConfig({
    plugins: [
        new webpack.IgnorePlugin(/\.\/locale$/),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.$': 'jquery',
            'window.jQuery': 'jquery',
            Popper: ['popper.js', 'default']
        }),
    ]})
    .js('resources/assets/js/app.js', 'public/js')

    // Frontend Script
    .js('resources/assets/js/frontend/nav.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/bus.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/common.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/auth/login.js', 'public/js/frontend/auth/')
    .js('resources/assets/js/frontend/auth/register.js', 'public/js/frontend/auth')
    .js('resources/assets/js/frontend/auth/reset.js', 'public/js/frontend/auth/')
    .js('resources/assets/js//frontend/about.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/homepage.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/universe.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/giftbox.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/experience.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/delivery.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/payment.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/collection.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/cart.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/contact.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/footer.js', 'public/js/frontend')
    .js('resources/assets/js/frontend/search.js', 'public/js/frontend')

    // Backend Script
    .js('resources/assets/js/backend/user/password.js', 'public/js/backend/user')
    .js('resources/assets/js/backend/dashboard/user.js', 'public/js/backend/dashboard')
    .js('resources/assets/js/backend/dashboard/merchant.js', 'public/js/backend/dashboard')
    .js('resources/assets/js/backend/dashboard/admin.js', 'public/js/backend/dashboard')
    .js('resources/assets/js/backend/company/view.js', 'public/js/backend/company')
    .js('resources/assets/js/backend/company/create.js', 'public/js/backend/company')
    .js('resources/assets/js/backend/universe/view.js', 'public/js/backend/universe')
    .js('resources/assets/js/backend/universe/create.js', 'public/js/backend/universe')
    .js('resources/assets/js/backend/universe/edit.js', 'public/js/backend/universe')
    .js('resources/assets/js/backend/voucher/activate.js', 'public/js/backend/voucher')
    .js('resources/assets/js/backend/voucher/physical_activate.js', 'public/js/backend/voucher')
    .js('resources/assets/js/backend/voucher/validate.js', 'public/js/backend/voucher')
    .js('resources/assets/js/backend/voucher/redeem.js', 'public/js/backend/voucher')
    .js('resources/assets/js/backend/giftbox/view.js', 'public/js/backend/giftbox')
    .js('resources/assets/js/backend/giftbox/create.js', 'public/js/backend/giftbox')
    .js('resources/assets/js/backend/giftbox/edit.js', 'public/js/backend/giftbox')
    .js('resources/assets/js/backend/experience/experience.js', 'public/js/backend/experience')
    .js('resources/assets/js/backend/experience/view.js', 'public/js/backend/experience')
    .js('resources/assets/js/backend/experience/create.js', 'public/js/backend/experience')
    .js('resources/assets/js/backend/purchase/history.js', 'public/js/backend/purchase')
    .js('resources/assets/js/backend/booking/view.js', 'public/js/backend/booking')
    .js('resources/assets/js/backend/booking/create.js', 'public/js/backend/booking')

    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/frontend.scss', 'public/css');
