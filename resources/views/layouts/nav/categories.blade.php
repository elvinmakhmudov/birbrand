<div class="row categories-header-2">
    <div class="container valign-wrapper">
        <div class="s12 categories-header-tabs">
            <navcategories :nav-categories="{{ $categories->toJson() }}"></navcategories>
<!--             <ul class="myCategories" v-bind:mycategories="{!! $categories->toJson() !!}">
                                @foreach($categories as $category)
                <li class="category-tab">
                    <a class="waves-effect waves-light" href="#/category/{{$category->slug}}">
                        @{{ $t('categories.'+{{ $category->title}}+'.main')}}
                    </a>
                </li>
                @endforeach

                <li class="category-tab" v-for="category in mycategories">
                    <a :href="'#/category/'+category.slug" class="waves-effect waves-light">
                        @{{ $t('categories.' + category.title +'.main')}}
                    </a>
                </li>
            </ul>
 -->        </div>
    </div>
</div>
