<div class="categories-header">
    <div class="nav-header">
        <div class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="tabbable">
                    <ul class="nav nav-pills nav-categories">
                        <li class="nav-item" v-for="category in categories">
                            <a class="nav-link" :href="'#/category/'+category.slug">@{{ $t('categories.' + category.title +
                                '.main')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
