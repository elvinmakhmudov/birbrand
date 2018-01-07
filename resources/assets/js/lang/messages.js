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
            title: 'About Us',
            text: '<p>GoShop is an online shop of fashionable clothes, shoes, accessories. Our goal is to stay in the customer with the coolest impressions of the shopping. For this reason, we offer more than 5,000 products, fast shipping, easy return policy. That is why we are choosen by thousands of people.</p>\n' +
            '<p>Priority of GoShop - own infrastructure: a modern IT-platform, warehouse complex, delivery service, call-center and photo studio.</p>\n' +
            '<p>In GoShop, we are assured: people who are pashionate about their work are doing it the best. \n' +
            'We are talking about new ideas and encouraging professional development. \n' +
            'GoShop is appreciated by colleagues in the collective. We not only work, but also rest together: we play football, celebrate holidays and have fun at our parties.</p>'
        },
        login: {
            title: 'Log In',
            number: 'Phone number',
            password: 'Password',
            loginButton: 'Log In',
            failed: 'These credentials do not match our records.',
            numeric: 'The number attribute must be a number.'
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
            "            <p class=\"text-title\">Delivery</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>After completing your order our operator will contact you.</p>\n" +
            "                <p>In the next 2-3 days the product will be delivered to you free of charge.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Payment</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>\n" +
            "                    Once purchased, you will be charged with cash.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title \">Customer satisfaction</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>For each product at the point of return 2 AZN.\n" +
            "                <p>If the product does not meet the description or images, it may be returned.\n" +
            "            </div>\n" +
            "        </div>",
            buyNowButton: "Buy Now",
            addToCardButton: "Add to Card",
            description: "Description",
            orders: "No orders |order | {count} orders",
            options: {
                size: {
                    main: "Size",
                    s: "S",
                    m: "M",
                    l: "L",
                    xl: "XL",
                    xxl: "2XL",
                    xxxl: "3XL",
                },
                color: {
                    main: "Color",
                    black: "Black",
                    white: "White"
                },
                quantity: 'Quantity'
            }
        },
        categories: {
            general: {
                order: {
                    main: 'On order'
                },
                home: {
                    main: 'Home clothes'
                },
                glasses: {
                    main: 'Glasses'
                },
                watches: {
                    main: 'Watches'
                },
                dresses: {
                    main: 'Dresses'
                },
                pants: {
                    main: 'Pants'
                },
                jackets: {
                    main: 'Jackets'
                },
                shirts: {
                    main: 'Shirts'
                },
                skirts: {
                    main: 'Skirts'
                },
                shoes: {
                    main: 'Shoes'
                },
                bags: {
                    main: 'Bags'
                },
                scarfs: {
                    main: 'Scarves'
                },
                wallets: {
                    main: 'Wallets'
                },
                accessories: {
                    main: 'Accessories',
                    bracelets: {
                        main: 'Bracelets'
                    },
                    rings: {
                        main: 'Rings'
                    },
                    earring: {
                        main: 'Earrings'
                    },
                    gloves: {
                        main: 'Gloves'
                    },
                    necklaces: {
                        main: 'Necklaces'
                    },
                    hats: {
                        main: 'Hats & Caps'
                    }
                },
                hoodies: {
                    main: 'Hoodies'
                },
                sport: {
                    main: 'Sport Clothes'
                }
            },
            mobile: {
                main: 'Mobile',
                cases: {
                    main: 'Cases'
                }
            },
            men: {
                main: 'Men',
            },
            women: {
                main: 'Women',
            },
            kids: {
                main: 'Kids',
            },
            appliances: {
                main: 'Appliances',
            },
            auto: {
                main: 'Cars',
            },
            school: {
                main: 'School',
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
        },
        buyItGuest: {
            title: 'Buy now',
            buyButton: 'Buy'
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
            title: 'Bizim haqqımızda',
            text: '<p>GoShop - dəbli qeyim, ayaqqabı və aksessuar internet-mağazasıdır. Bizim məqsədimiz müştərilərdə alış verişdən ən xoş təəssürat yaratmaqdır.  Buna görə biz 5000 məhsul, sürətli çatdırılma və sərfəli geriqaytarma təklif edirik. Məs buna görə bizi minlərlə müştəri seçir.</p>\n' +
            '<p>GoShop-un üstünlükləri  - özəl infrastruktur: möhtəşəm IT-platform, anbar kompleksi, çatdırılma xidməti, call-center və fotostudiadır. </p>\n' +
            '<p>GoShop-da biz əminik, öz işinə maraq göstərən insanlar işini daha yaxşı görür.\n' +
            'Ona görə biz yeni ideaları sərbəst müzakirə və peşəkar inkişafı təşviq edirik. \n' +
            'GoShop kollektivdə dostluq münasibətlərini qiymətləndirir. \n' +
            'Biz yalnız işləmirik, həm də birlikdə istirahət edirik: biz futbol oynayır, bayramlar keçirir və partylərdə əylənirik.</p>'
        },
        login: {
            title: 'Giriş',
            number: 'Telefon nömrəsi',
            password: 'Şifrə',
            loginButton: 'Giriş',
            failed: 'Nömrə yada şifrə səfdir.',
            numeric: 'Nömrə ancaq rəqəmlərdən ibarət ola bilər.'
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
            general: {
                order: {
                    main: 'Sifarişlə'
                },
                home: {
                    main: 'Ev geyimləri'
                },
                glasses: {
                    main: 'Eynək'
                },
                watches: {
                    main: 'Saat'
                },
                dresses: {
                    main: 'Don'
                },
                pants: {
                    main: 'Şalvar'
                },
                jackets: {
                    main: 'Gödəkçə'
                },
                shirts: {
                    main: 'Köynək'
                },
                skirts: {
                    main: 'Ətək'
                },
                shoes: {
                    main: 'Ayaqqabı'
                },
                bags: {
                    main: 'Çanta'
                },
                scarfs: {
                    main: 'Şərf'
                },
                wallets: {
                    main: 'Cüzdan'
                },
                accessories: {
                    main: 'Aksessuar',
                    bracelets: {
                        main: 'Qolbağ'
                    },
                    rings: {
                        main: 'Üzük'
                    },
                    earring: {
                        main: 'Sırqa'
                    },
                    gloves: {
                        main: 'Əlcək'
                    },
                    necklaces: {
                        main: 'Boyunbağı'
                    },
                    hats: {
                        main: 'Papaq'
                    }
                },
                hoodies: {
                    main: 'Jaket'
                },
                sport: {
                    main: 'Idman'
                }
            },
            mobile: {
                main: 'Telefon',
                cases: {
                    main: 'Kabura'
                }
            },
            men: {
                main: 'Kişi',
            },
            women: {
                main: 'Qadın',
            },
            kids: {
                main: 'Uşaq',
            },
            appliances: {
                main: 'Məişət texnikası',
            },
            auto: {
                main: 'Avtomobil',
            },
            school: {
                main: 'Məktəb',

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
            "                <p>Növbəti 2-3 gün məhsul sizə pulsuz çatdırılacaq.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Ödəniş</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>\n" +
            "                    Ödəniş məhsulu əldə etdikdən sonra yerindəcə nağd həyata keçirilir.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title \">Müştəri məmnuniyyəti</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Qaytarış yerində hər bir məhsula görə 2 AZN.\n" +
            "                <p>Məhsul təsvirə yaxud şəkillərə uyğun gəlmədikdə ödənişsiz qaytarla bilər.\n" +
            "            </div>\n" +
            "        </div>",
            buyNowButton: "İndi al",
            addToCardButton: "Səbətə at",
            description: "Ətraflı",
            orders: "Sifariş olunmayıb | 1 sifariş |{count}  sifariş",
            options: {
                size: {
                    main: "Ölçü",
                    s: "S",
                    m: "M",
                    l: "L"
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
        },
        buyItGuest: {
            title: 'Indi al',
            buyButton: 'Indi al'
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
            title: 'О нас',
            text: '<p>GoShop – это интернет-магазин модной одежды, обуви, аксессуаров. Наша цель – оставить у клиента самые приятные впечатления от шопинга. Для этого мы предлагаем более 5 000 товаров, быструю доставку, услугу предварительной примерки и удобные условия возврата. Именно поэтому нас выбирают тысячи покупателей.</p>\n' +
            '<p>Преимущества GoShop – собственная инфраструктура: мощная IT-платформа, складской комплекс, служба доставки, call-центры и фотостудия.</p>\n' +
            '<p>В GoShop мы уверены: люди, увлеченные своей работой, делают ее лучше. Поэтому мы с готовностью обсуждаем новые идеи и поощряем профессиональное развитие. В GoShop ценятся дружеские отношения в коллективе. Мы не только работаем, но и отдыхаем вместе: играем в футбол, отмечаем праздники и веселимся на наших вечеринках.</p>'
        },
        login: {
            title: 'Вход',
            number: 'Номер телефона',
            password: 'Пароль',
            loginButton: 'Войти',
            failed: 'Номер телефона или пароль не верны.',
            numeric: 'Номер телефона может состоять только из цифр.'
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
            general: {
                order: {
                    main: 'Под заказ'
                },
                home: {
                    main: 'Домашняя одежда'
                },
                glasses: {
                    main: 'Очки'
                },
                watches: {
                    main: 'Часы'
                },
                dresses: {
                    main: 'Платье'
                },
                pants: {
                    main: 'Брюки'
                },
                jackets: {
                    main: 'Куртки'
                },
                shirts: {
                    main: 'Рубашки'
                },
                skirts: {
                    main: 'Юбки'
                },
                shoes: {
                    main: 'Обувь'
                },
                bags: {
                    main: 'Сумки'
                },
                scarfs: {
                    main: 'Шарфы'
                },
                wallets: {
                    main: 'Бумажники'
                },
                accessories: {
                    main: 'Аксессуары',
                    bracelets: {
                        main: 'Браслеты'
                    },
                    rings: {
                        main: 'Кольца'
                    },
                    earring: {
                        main: 'Серьги'
                    },
                    gloves: {
                        main: 'Перчатки'
                    },
                    necklaces: {
                        main: 'Ожерелья'
                    },
                    hats: {
                        main: 'Шапки'
                    }
                },
                hoodies: {
                    main: 'Толстовки'
                },
                sport: {
                    main: 'Спорт'
                }
            },
            mobile: {
                main: 'Мобильный',
                cases: {
                    main: 'Чехлы'
                }
            },
            men: {
                main: 'Мужчины',
            },
            women: {
                main: 'Женщины',
            },
            kids: {
                main: 'Дети',
            },
            appliances: {
                main: 'Бытовая техника',
            },
            auto: {
                main: 'Авто',
            },
            school: {
                main: 'Школа',

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
            "            <p class=\"text-title\">Доставка</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>После завершения вашего заказа наш оператор свяжется с вами.</p>\n" +
            "                <p>В течение следующих 2 дней продукт будет доставлен бесплатно.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title\">Оплата</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>\n" +
            "                    Покупка осуществляется только наличными.</p>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "        <div class=\"item-shipping-payment-box\">\n" +
            "            <p class=\"text-title \">Удовлетворенность клиентов</p>\n" +
            "            <div class=\"text\">\n" +
            "                <p>Возврат на каждый продукт 2 AZN.\n" +
            "                <p>Если продукт не соответствует описанию или изображениям, он может быть возмещен.\n" +
            "            </div>\n" +
            "        </div>",
            buyNowButton: "Купить",
            addToCardButton: "В корзину",
            description: "Описание",
            orders: "Нет заказов | 1 заказ | {count} заказов",
            options: {
                size: {
                    main: "Размер",
                    s: "S",
                    m: "M",
                    l: "L"
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
        },
        buyItGuest: {
            title: 'Купить сейчас',
            buyButton: 'Купить'
        }
    }
};
export default messages;
