const messages = {
    en: {
        main: {
            about: 'About Us',
            login: 'Log In',
            signUp: 'Sign Up',
            language: 'en',
            profile: 'My profile',
            adminPanel: 'Admin Panel',
            orders: 'My orders',
            logout: 'Log out'
        },
        about: {
            text: 'About Us page text'
        },
        login: {
            title: 'Log In',
            number: 'Phone number',
            password: 'Password',
            loginButton: 'Log In'
        },
        signup: {
            title: 'Sign up',
            name: 'Name',
            number: 'Phone number',
            address: 'Address(optional)',
            password: 'Password',
            signUpButton: 'Sign Up'
        },
        profile: {
            title: 'My page',
            name: 'Name',
            general: 'General',
            changePassword: 'Change Password',
            number: 'Phone number',
            address: 'Address(optional)',
            password: 'Password',
            passwordNew: 'New password',
            saveButton: 'Save',
            changePasswordButton: 'Change password',
            update: {
                success: "Your profile has been updated.",
                error: "Password is wrong."
            },
            passwordUpdate: {
                success: "Your password has been changed."
            }
        },
        product: {
            shippingInfo: "" +
            "<div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Çatdırılma</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Sifarişi etdikdən sonra operatorumuz sizinlə əlaqə saxlayacaq.</p>\n" +
            "                <p>Növbəti gün məhsul sizə pulsuz çatdırılacaq.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Ödəniş</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>\n" +
            "                    Ödəniş məhsulu əldə etdikdən sonra yerindəcə nağd yaxud taksit kartla FAİZSİZ (Albalı+, BolKart, WordCard, SmileCard, BirKart) həyata keçirilir.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title \">Müştəri məmnuniyyəti</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Qaytarış yerində hər bir məhsula görə\n" +
            "                    <br><b>2 AZN</b></p>\n" +
            "                <p>Məhsul təsvirə yaxud şəkillərə uyğun gəlmədikdə<b> ödənişsiz</b>qaytarla bilər.\n" +
            "                </p>\n" +
            "                <p>Saat 18:00-dək EXPRESS (2 saat ərzində) çatdırılma 5 AZN.\n" +
            "                </p>\n" +
            "            </div>\n" +
            "        </div>",
            buyNowButton: "Buy Now",
            addToCardButton: "Add to Card",
            description: "Description",
            orders: "order | {count} orders",
            options: {
                size: {
                    main: "Size"
                },
                color: {
                    main: "Color",
                    black: "Black",
                    white: "White"
                },
                quantity: 'Quantitjy'
            }
        },
        categories: {
            belts: {
                main: 'Belts',
            },
            men: {
                main: 'For Men',
            },
            women: {
                main: 'For Women',
            },
            kids: {
                main: 'For Kids',
            },
            appliances: {
                main: 'Appliances',
            },
            auto: {
                main: 'For Cars',
            },
            school: {
                main: 'For School',
            },
            main: {
                sortBy: {
                    main: 'Sort By',
                    rating: 'Rating',
                    date: 'New',
                    priceLow: 'Price (low first)',
                    priceHigh: 'Price (high first)',
                    bestseller: 'Bestsellers',
                    trending: 'Trending'
                }
            }
        },
        shoppingCard: {
            title: 'My Shopping Card',
            table: {
                product: 'Product',
                price: 'Price',
                quantity: 'Quantity',
                remove: 'Remove',
                total: 'Total',
            },
            buyNowButton: 'Buy Now',
            empty: "Your shopping card is empty"
        },
        pagination: {
            previousButton: 'Prev',
            nextButton: 'Next'
        },
        order: {
            title: 'My orders',
            table: {
                product: 'Product',
                deliveryStatus: 'Delivery status',
                orderDate: 'Date of order',
                rate: 'Please rate your order'
            },
            status: {
                payment: 'Awaiting payment.',
                processing: 'Processing.',
                delivered: 'Delivered.',
                shipped: 'On the way.',
                cancelled: 'Cancelled.',
                dispute: 'Dispute in progress.',
                finished: 'Finished.',
            }
        },
        flashMessage: {
            title: 'Notification',
            messages: {
                buy: {
                    success: 'Thank you! Your order has been placed.',
                },
                rate: {
                    success: 'Thank you! Your rate has been stored.',
                },
                addToCart: {
                    success: 'Your order has been added to your shopping cart',
                },
                error: 'Ooopps! Something went wrong. Please try again.'
            },
            closeButton: 'Close'
        }
    },
    az: {
        main: {
            about: 'Haqqımızda',
            login: 'Giriş',
            signUp: 'Qeydiyyat',
            language: 'az',
            profile: 'Səhifəm',
            adminPanel: 'Admin Panel',
            orders: 'Sifarişlərim',
            logout: 'Çıxış'
        },
        about: {
            text: 'Bizim haqqımızda'
        },
        login: {
            title: 'Giriş',
            number: 'Telefon nömrəsi',
            password: 'Şifrə',
            loginButton: 'Giriş'
        },
        profile: {
            title: 'Mənim səhifəm',
            general: 'Ümumi',
            changePassword: 'Şifrəni dəyişmək',
            name: 'Ad',
            number: 'Telefon nömrəsi',
            address: 'Ünvan(əlavə)',
            password: 'Şifrə',
            passwordNew: 'Yeni Şifrə',
            saveButton: 'Yadda saxla',
            changePasswordButton: 'Şifrəni dəyiş',
            update: {
                success: "Səhifəniz yeniləndi.",
                error: "Daxil etdiyiniz şifrə yanlışdır."
            },
            passwordUpdate: {
                success: "Şifrəniz dəyişildi."
            }
        },
        signup: {
            title: 'Qeydiyyat',
            name: 'Ad',
            number: 'Telefon nömrəsi',
            address: 'Ünvan(əlavə)',
            password: 'Şifrə',
            signUpButton: 'Qeyd et'
        },
        categories: {
            men: {
                main: 'Kişi üçün',
            },
            women: {
                main: 'Qadın üçün',
            },
            kids: {
                main: 'Uşaqlar üçün',
            },
            appliances: {
                main: 'Məişət texnikası',
            },
            auto: {
                main: 'Avtomobil üçün',
            },
            school: {
                main: 'Məktəb üçün',

            },
            main: {
                sortBy: {
                    main: 'Çeşidləmə',
                    rating: 'Reyting',
                    date: 'Yeni',
                    priceLow: 'Əvvəlcə ucuz',
                    priceHigh: 'Əvvəlcə bahalı',
                    bestseller: 'Ən çox satılan',
                    trending: 'Tövsiyə'
                }
            }
        },
        product: {
            shippingInfo: "" +
            "<div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Çatdırılma</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Sifarişi etdikdən sonra operatorumuz sizinlə əlaqə saxlayacaq.</p>\n" +
            "                <p>Növbəti gün məhsul sizə pulsuz çatdırılacaq.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Ödəniş</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>\n" +
            "                    Ödəniş məhsulu əldə etdikdən sonra yerindəcə nağd yaxud taksit kartla FAİZSİZ (Albalı+, BolKart, WordCard, SmileCard, BirKart) həyata keçirilir.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title \">Müştəri məmnuniyyəti</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Qaytarış yerində hər bir məhsula görə\n" +
            "                    <br><b>2 AZN</b></p>\n" +
            "                <p>Məhsul təsvirə yaxud şəkillərə uyğun gəlmədikdə<b> ödənişsiz</b>qaytarla bilər.\n" +
            "                </p>\n" +
            "                <p>Saat 18:00-dək EXPRESS (2 saat ərzində) çatdırılma 5 AZN.\n" +
            "                </p>\n" +
            "            </div>\n" +
            "        </div>",
            buyNowButton: "İndi al",
            addToCardButton: "Səbətə at",
            description: "Ətraflı",
            orders: "{count}  sifariş",
            options: {
                size: {
                    main: "Ölçü"
                },
                color: {
                    main: "Rəng",
                    black: "Qara",
                    white: "Ağ"
                },
                quantity: 'Ədəd'
            }
        },
        shoppingCard: {
            title: 'Mənim səbətim',
            table: {
                product: 'Məhsul',
                price: 'Qiymət',
                quantity: 'Miqdar',
                remove: 'Silmək',
                total: 'Cəmi',
            },
            buyNowButton: 'İndi al',
            empty: "Səbətiniz boşdur"
        },
        pagination: {
            previousButton: 'Geri',
            nextButton: 'İrəli'
        },
        order: {
            title: 'Mənim sifarişlərim',
            table: {
                product: 'Məhsul',
                deliveryStatus: 'Çatdırılma statusu',
                orderDate: 'Sifariş tarixi',
                rate: 'Zəhmət olmasa rəy bildirin.'
            },
            status: {
                payment: 'Ödəniş gözlənilir.',
                processing: 'İşlənilir.',
                delivered: 'Çatdırılıb.',
                shipped: 'Göndərilib.',
                cancelled: 'İmtina olunub.',
                dispute: 'Mübahisə davam edir.',
                finished: 'Bitib.',
            }
        },
        flashMessage: {
            title: 'Mesaj',
            messages: {
                buy: {
                    success: 'Təşəkkürlər! Sifarişiniz qeydə alındı.',
                },
                rate: {
                    success: 'Təşəkkürlər! Rəyiniz qeydə alındı.',
                },
                addToCart: {
                    success: 'Sifarişiniz səbətə əlavə olundu.',
                },
                error: 'Aaaa! Səf baş verdi. Zəhmət olmasa bir daha təkrar edin.'
            },
            closeButton: 'Bağla'
        }
    },
    ru: {
        main: {
            about: 'О Нас',
            login: 'Вход',
            signUp: 'Регистрация',
            language: 'ru',
            profile: 'Мой профиль',
            adminPanel: 'Админ панель',
            orders: 'Мои заказы',
            logout: 'Выход'
        },
        about: {
            text: 'Страница о Нас'
        },
        login: {
            title: 'Вход',
            number: 'Номер телефона',
            password: 'Пароль',
            loginButton: 'Войти'
        },
        profile: {
            title: 'Моя страница',
            changePassword: 'Изменить пароль',
            general: 'Общее',
            name: 'Имя',
            number: 'Номер телефона',
            address: 'Адрес(дополнительно)',
            password: 'Пароль',
            passwordNew: 'Новый пароль',
            saveButton: 'Сохранить',
            changePasswordButton: 'Изменить пароль',
            update: {
                success: "Страница обновлена.",
                error: "Пароль не верный."
            },
            passwordUpdate: {
                success: "Пароль изменен."
            }
        },
        signup: {
            title: 'Регистрация',
            name: 'Имя',
            number: 'Номер телефона',
            address: 'Адрес(дополнительно)',
            password: 'Пароль',
            signUpButton: 'Зарегистрировать'
        },
        categories: {
            men: {
                main: 'Для мужчин',
            },
            women: {
                main: 'Для женщин',
            },
            kids: {
                main: 'Для детей',
            },
            appliances: {
                main: 'Бытовая техника',
            },
            auto: {
                main: 'Для авто',
            },
            school: {
                main: 'Для школы',

            },
            main: {
                sortBy: {
                    main: 'Сортировка',
                    rating: 'Рейтингу',
                    date: 'Новые',
                    priceLow: 'По возрастанию цены',
                    priceHigh: 'По убыванию цены',
                    bestseller: 'Бестселлеры',
                    trending: 'Рекомендации'
                }
            }
        },
        product: {
            shippingInfo: "" +
            "<div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Çatdırılma</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Sifarişi etdikdən sonra operatorumuz sizinlə əlaqə saxlayacaq.</p>\n" +
            "                <p>Növbəti gün məhsul sizə pulsuz çatdırılacaq.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Ödəniş</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>\n" +
            "                    Ödəniş məhsulu əldə etdikdən sonra yerindəcə nağd yaxud taksit kartla FAİZSİZ (Albalı+, BolKart, WordCard, SmileCard, BirKart) həyata keçirilir.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title \">Müştəri məmnuniyyəti</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Qaytarış yerində hər bir məhsula görə\n" +
            "                    <br><b>2 AZN</b></p>\n" +
            "                <p>Məhsul təsvirə yaxud şəkillərə uyğun gəlmədikdə<b> ödənişsiz</b>qaytarla bilər.\n" +
            "                </p>\n" +
            "                <p>Saat 18:00-dək EXPRESS (2 saat ərzində) çatdırılma 5 AZN.\n" +
            "                </p>\n" +
            "            </div>\n" +
            "        </div>",
            buyNowButton: "Купить",
            addToCardButton: "В корзину",
            description: "Описание",
            orders: "{count} заказов",
            options: {
                size: {
                    main: "Размер"
                },
                color: {
                    main: "Цвет",
                    black: "Черный",
                    white: "Белый"
                },
                quantity: 'Количество'
            }
        },
        shoppingCard: {
            title: 'Моя корзина',
            table: {
                product: 'Продукт',
                price: 'Цена',
                quantity: 'Количество',
                remove: 'Удалить',
                total: 'Сумма',
            },
            buyNowButton: 'Купить',
            empty: "Ваша корзина пуста"
        },
        pagination: {
            previousButton: 'Назад',
            nextButton: 'Вперед'
        },
        order: {
            title: 'Мои заказы',
            table: {
                product: 'Продукт',
                deliveryStatus: 'Статус доставки',
                orderDate: 'Дата заказа',
                rate: 'Оцените ваш заказ.'
            },
            status: {
                payment: 'Ожидается платеж.',
                processing: 'В обработке.',
                delivered: 'Доставлено.',
                shipped: 'В пути.',
                cancelled: 'Отменен.',
                dispute: 'Ведется спор.',
                finished: 'Завершен.',
            }
        },
        flashMessage: {
            title: 'Уведомление',
            messages: {
                buy: {
                    success: 'Благодарим! Ваш заказ принят.',
                },
                rate: {
                    success: 'Благодарим! Ваш отзыв учтен.',
                },
                addToCart: {
                    success: 'Ваш заказ добавлен в корзину.',
                },
                error: 'Оййййй! Произошла ошибка. Пожалуйтса повторите еще.'
            },
            closeButton: 'Закрыть'
        }
    }
};
export default messages;
