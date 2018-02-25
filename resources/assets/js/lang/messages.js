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
            text: '<p class="indent">Modno is an online shopping platform of fashionable clothes, shoes, accessories. We cooperate with a huge number of manufacturers as well as sellers. Our goal is to leave the customer with the most pleasant shopping experience. For this reason, we offer more than 5,000 products, fast shipping, easy return policy. That is why we are choosen by thousands of people.</p>\n' +
                '<p class="indent">Priority of Modno - own infrastructure: a modern IT-platform, warehouse complex, delivery service, call-center and photo studio.</p>\n' +
                '<p class="indent">In Modno, we are assured: people who are pashionate about their work are doing it the best. \n' +
                'We are talking about new ideas and encouraging professional development. \n' +
                'Modno is appreciated by colleagues in the collective. We not only work, but also rest together: we play football, celebrate holidays and have fun at our parties.</p>'
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
                "                <p>After completing your order our operator will contact You.</p>\n" +
                "                <p>Generally, orders are delivered within 14 - 60 days. However, in certain cases (bad weather, holidays, etc.), delivery time may be delayed.</p>\n" +
                "                <p>After product arrives, it will be delivered to buyer free of charge.</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"item-shipping-payment-box\">\n" +
                "            <p class=\"text-title\">Payment</p>\n" +
                "            <div class=\"text\">\n" +
                "                <p>Prepayment is 50 percent of the order price. It can be made with cash or via \"Milli Ön\" terminals.</p>\n" +
                "                <p>\n" +
                "                    Once purchased, buyer will be charged with cash.</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"item-shipping-payment-box\">\n" +
                "            <p class=\"text-title \">Customer satisfaction</p>\n" +
                "            <div class=\"text\">\n" +
                "                <p>If the buyer did not receive the goods within 90 days he will get full refund.</p>\n" +
                "            </div>\n" +
                "        </div>",
            buyNowButton: "Order Now",
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
                    xxxxl: "4XL",
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
                clothes: {
                    main: 'Clothes'
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
                suits: {
                    main: 'Suits'
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
                    },
                    hair: {
                        main: 'Hair'
                    },
                    keychains: {
                        main: 'Keychains'
                    }
                },
                sweaters: {
                    main: 'Sweaters'
                },
                hoodies: {
                    main: 'Hoodies'
                },
                sport: {
                    main: 'Sport Clothes'
                }
            },
            electronics: {
                main: 'Electronics',
                mobile: {
                    main: 'Phone',
                    cases: {
                        main: 'Phone Cases'
                    }
                }
            },
            home: {
                main: 'Home'
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
            buyNowButton: 'Order Now',
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
            title: 'Order now',
            buyButton: 'Order now'
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
            text: '<p class="indent">Modno - dəbli qeyim, ayaqqabı və aksessuarların onlayn alış-veriş platformasıdır. Biz çox sayda istehsalçı ilə, eləcə də satıcılar ilə əməkdaşlıq edirik. Bizim məqsədimiz müştərilərdə alış verişdən ən xoş təəssürat yaratmaqdır.  Buna görə biz 5000 məhsul, sürətli çatdırılma və sərfəli geriqaytarma təklif edirik. Məhz buna görə bizi minlərlə müştəri seçir.</p>\n' +
                '<p class="indent">Modno-un üstünlükləri  - özəl infrastruktur: möhtəşəm IT-platform, anbar kompleksi, çatdırılma xidməti, call-center və fotostudiadır. </p>\n' +
                '<p class="indent">Modno-da biz əminik, öz işinə maraq göstərən insanlar işini daha yaxşı görür.\n' +
                'Ona görə biz yeni ideaları sərbəst müzakirə və peşəkar inkişafı təşviq edirik. \n' +
                'Modno kollektivdə dostluq münasibətlərini qiymətləndirir. \n' +
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
                clothes: {
                    main: 'Geyim'
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
                suits: {
                    main: 'Kostyum'
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
                    },
                    hair: {
                        main: 'Saç üçün'
                    },
                    keychains: {
                        main: 'Breloklar'
                    }
                },
                sweaters: {
                    main: 'Sviter'
                },
                hoodies: {
                    main: 'Jaket'
                },
                sport: {
                    main: 'Idman'
                }
            },
            electronics: {
                main: 'Elektronika',
                mobile: {
                    main: 'Mobil telefon',
                    cases: {
                        main: 'Kaburalar'
                    }
                }
            },
            home: {
                main: 'Ev'
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
                "                <p>Sifarişi etdikdən sonra operatorumuz Sizinlə əlaqə saxlayacaq.</p>\n" +
                "                <p>Adətən, sifarişlər 14 - 60 günü ərzində çatdırılır, lakin müəyyən hallarda  (pis hava, bayram və s.), çatdırılma vaxtı gecikdirilə bilər.</p>\n" +
                "                <p>Məhsul gəldikdən sonra alıcıya pulsuz çatdırılacaq.</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"item-shipping-payment-box\">\n" +
                "            <p class=\"text-title\">Ödəniş</p>\n" +
                "            <div class=\"text\">\n" +
                 "<p>İlkin ödəniş sifariş məbləğinin 50 faizini təşkil edir.  İlkin ödəniş nağd pul və ya \"Milli Ön\" terminalı ilə edilə bilər. </p>\n" +
                "                <p>\n" +
                "                    Ödəniş məhsulu əldə etdikdən sonra yerindəcə nağd həyata keçirilir.</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"item-shipping-payment-box\">\n" +
                "            <p class=\"text-title \">Müştəri məmnuniyyəti</p>\n" +
                "            <div class=\"text\">\n" +
                "                <p>Əgər məhsul alıcıya 90 gün ərzində çatdırılmasa, ödənilən məbləğ tam geri qaytarılacaq.\n" +
                "            </div>\n" +
                "        </div>",
            buyNowButton: "Sifariş et",
            addToCardButton: "Səbətə at",
            description: "Ətraflı",
            orders: "Sifariş olunmayıb | 1 sifariş |{count}  sifariş",
            options: {
                size: {
                    main: "Ölçü",
                    s: "S",
                    m: "M",
                    l: "L",
                    xl: "XL",
                    xxl: "2XL",
                    xxxl: "3XL",
                    xxxxl: "4XL",
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
            buyNowButton: 'Sifariş et',
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
            title: 'Sifariş et',
            buyButton: 'Sifariş et'
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
            text: '<p class="indent"> Modno – это онлайн торговая платформа модной одежды, обуви, аксессуаров. Мы сотрудничаем с огромным количеством производителей, а также продавцов. Наша цель – оставить у клиента самые приятные впечатления от шопинга. Для этого мы предлагаем более 5 000 товаров, быструю доставку, услугу предварительной примерки и удобные условия возврата. Именно поэтому нас выбирают тысячи покупателей.</p>\n' +
                '<p class="indent">Преимущества Modno – собственная инфраструктура: мощная IT-платформа, складской комплекс, служба доставки, call-центры и фотостудия.</p>\n' +
                '<p class="indent">В Modno мы уверены: люди, увлеченные своей работой, делают ее лучше. Поэтому мы с готовностью обсуждаем новые идеи и поощряем профессиональное развитие. В Modno ценятся дружеские отношения в коллективе. Мы не только работаем, но и отдыхаем вместе: играем в футбол, отмечаем праздники и веселимся на наших вечеринках.</p>'
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
                clothes: {
                    main: 'Одежда'
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
                suits: {
                    main: 'Костюмы'
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
                    },
                    hair: {
                        main: 'Для волос'
                    },
                    keychains: {
                        main: 'Брелки'
                    }
                },
                sweaters: {
                    main: 'Свитер'
                },
                hoodies: {
                    main: 'Толстовки'
                },
                sport: {
                    main: 'Спорт'
                }
            },
            electronics: {
                main: 'Электроника',
                mobile: {
                    main: 'Мобильный',
                    cases: {
                        main: 'Чехлы на телефон'
                    }
                }
            },
            men: {
                main: 'Мужчины',
            },
            home: {
                main: 'Дом'
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
                    priceLow: 'Цена вверх',
                    priceHigh: 'Цена вниз',
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
                "                <p>После завершения вашего заказа наш оператор свяжется с Вами.</p>\n" +
                "                <p>Как правило, заказы доставляются в течение 14 - 60 дней. Однако в некоторых случаях (плохая погода, праздничные дни и т.д.) время доставки может быть отложено.</p>\n" +
                "                <p>После поступления товара в склад, он будет доставлен покупателю бесплатно.</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"item-shipping-payment-box\">\n" +
                "            <p class=\"text-title\">Оплата</p>\n" +
                "            <div class=\"text\">\n" +
                "                <p>Предоплата составляет 50 процентов от стоимости заказа. Предоплату можно сделать наличными или через терминалы «Milli Ön».</p>\n" +
                "                <p>\n" +
                "                <p>\n" +
                "                    Покупка осуществляется только наличными.</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"item-shipping-payment-box\">\n" +
                "            <p class=\"text-title \">Удовлетворенность клиентов</p>\n" +
                "            <div class=\"text\">\n" +
                "                <p>Если покупатель не получил товар в течение 90 дней, он получит полный возврат средств.\n" +
                "            </div>\n" +
                "        </div>",
            buyNowButton: "Заказать",
            addToCardButton: "В корзину",
            description: "Описание",
            orders: "Нет заказов | 1 заказ | {count} заказов",
            options: {
                size: {
                    main: "Размер",
                    s: "S",
                    m: "M",
                    l: "L",
                    xl: "XL",
                    xxl: "2XL",
                    xxxl: "3XL",
                    xxxxl: "4XL",
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
            buyNowButton: 'Заказать',
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
            title: 'Заказать сейчас',
            buyButton: 'Заказать'
        }
    }
};
export default messages;