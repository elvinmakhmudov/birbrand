<template>
  <div class="layout">
    <div class="row">
      <div class="col s12">
        <div class="row">
          <div class="nav-wrapper breadcrumbs valign-wrapper">
            <div class="col s12">
              <a :href="'#/category/'+ancestor.slug" class="breadcrumb" v-for="ancestor in ancestors">
                {{ $t('categories.' + ancestor.title + '.main')}}
              </a>
              <a class="breadcrumb">
                {{ product.title }}
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <h5>
              {{ product.title }}
            </h5>
          </div>
          <div class="col m4 s12">
            <div class="product-img" v-if="!isEmptyProduct">
              <img :src="'/storage/'+product.cover_image" :xoriginal="'/storage/'+product.cover_image" class="xzoom" />
              <div class="xzoom-thumbs">
                <a :href="'/storage/' + product.cover_image">
                  <img :src="'/storage/' + product.cover_image" alt="" class="xzoom-gallery">
                </a>
                <a :href="'/storage/'+image" v-for="image in product.images ">
                  <img :src="'/storage/'+image" class="xzoom-gallery">
                </a>
              </div>

            </div>
          </div>
          <div class="col m4 s12">
            <h4 class="center-align">
              {{ product.price }} AZN
            </h4>
            <div class="col s12 center-align additional-container">
              <div id="rateYo" class="rating-container"></div>

              <span>{{ product.ordered}} orders</span>
            </div>

            <form @submit.prevent="buyIt()">
              <div class="valign-wrapper input-field product-option col s6" v-for="(options, key) in JSON.parse(product.options || '[]')" v-show="product.options">
                <label :for="key" class="active product-option-key">
                  {{ key }}
                </label>
                <select class="product-option-value" v-bind:id="key">
                  <option :value="option" v-for="option in options">{{ option }}</option>
                </select>
              </div>
              <div class="input-field col s12 valign-wrapper">
                <label class="active">
                  Ədəd
                </label>
                <label class="control-label text-danger" v-if="errors.has('amount')" v-text="errors.get('amount')">
                </label>
                <input @keydown="errors.purge()" class="form-control" id="i5ps" max="100" min="1" type="number" v-model="amount" value="1">
                </input>
              </div>
              <div class="submit-buttons center-align col s12">
                <button class="btn waves-effect waves-light" name="action" type="submit">
                  {{ $t('product.buyNowButton') }}
                </button>
                <button @click.prevent="addToCart()" class="btn waves-effect waves-light" name="action" type="submit">
                  <i class="material-icons left">add_shopping_cart</i>
                  {{ $t('product.addToCardButton') }}
                </button>
              </div>
            </form>
          </div>
          <div class="col m4 s12">
            <shippinginfo>
            </shippinginfo>
          </div>
          <div class="col s12">
            <h5>
              {{ $t('product.description') }}
            </h5>
            <div class="product-description">
              {{ product.description }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <buyitguest :products="products">
    </buyitguest>
  </div>
</template>
<script>
import Errors from "../classes/Errors";
import Vue from "vue";
import BuyItGuest from "../components/product/buyItGuest.vue";
import ShippingInfo from "../components/product/shippingInfo.vue";

export default {
  components: {
    buyitguest: BuyItGuest,
    shippinginfo: ShippingInfo
  },
  props: {
    product_id: ""
  },
  data() {
    return {
      errors: new Errors(),
      amount: 1,
      product: {},
      ancestors: [],
      products: []
    };
  },
  watch: {
    // call again the method if the route changes
  },
  created() {
    this.fetchData();
  },
  mounted() {},
  computed: {
    isEmptyProduct: function() {
      return jQuery.isEmptyObject(this.product);
    }
  },
  methods: {
    getSelectedProductOptions() {
      var options = {};
      $(".product-option").each(function() {
        var key = $(this)
          .find(".product-option-key")
          .text()
          .replace(/\s/g, "");
        var value = $(this)
          .find("select.product-option-value")
          .val();
        options[key] = value;
      });
      console.log(options);
      return JSON.stringify(options);
    },
    addToCart() {
      axios
        .post("cart", {
          productId: this.product.id,
          options: this.getSelectedProductOptions(),
          amount: this.amount
        })
        .then(
          function(response) {
            this.$store.state.errors.record(response.data.errors);
            this.$store.state.messages.record(response.data.messages);
            this.$store.commit("setCartTotal", response.data.cart.cartTotal);
            var items = Object.keys(response.data.cart.cartItems).map(function(
              k
            ) {
              return response.data.cart.cartItems[k];
            });
            this.$store.commit("setCartItems", items);
            $("#flash-message").modal("open");
          }.bind(this)
        )
        .catch(error => {
          this.errors.record(error.response.data.errors);
        });
    },
    buyIt() {
      this.products = [
        {
          productId: this.product.id,
          options: this.getSelectedProductOptions(),
          amount: this.amount
        }
      ];
      var isLoggedIn = $("meta[name=login-status]").attr("content");

      if (isLoggedIn) {
        axios
          .post("order", {
            products: this.products
          })
          .then(
            function(response) {
              this.$store.state.errors.record(response.data.errors);
              this.$store.state.messages.record(response.data.messages);
              $("#flash-message").modal("open");
            }.bind(this)
          )
          .catch(error => {
            this.errors.record(error.response.data);
          });
      } else {
        $("#buy-it-guest").modal("open");
      }
      
    },
    fetchData() {
      console.log(this.product_id);
      var productUrl = "product/" + this.product_id;
      axios.get(productUrl).then(
        function(response) {
          this.product = response.data;
          this.ancestors = this.getAncestors(this.product);
          Vue.nextTick(
            function() {
              $(".modal").modal();

              $(".xzoom, .xzoom-gallery").xzoom({
                scroll: false
              });
              this.$store.state.activeCategorySlug = this.getAncestors(
                this.product
              )[0].slug;
              var selector = ".nav-categories li";
              //                        if($(selector).find('.active').children('a').data("slug") !== this.$store.state.activeCategorySlug){
              $(selector).removeClass("active");
              $(
                $(selector).find(
                  `[data-slug='${this.$store.state.activeCategorySlug}']`
                )
              )
                .parent("li")
                .addClass("active");
              //                        }
              $("select").material_select();
              $("#rateYo").rateYo({
                rating: 3.6,
                starWidth: "15px"
              });
            }.bind(this)
          );
        }.bind(this)
      );
      console.log("Product fetched");
    },
    getAncestors(product) {
      var ancestors = [];
      var categoryAncestors = this.getValuesByKey(
        product.category,
        "ancestors"
      );
      if (Array.isArray(categoryAncestors) && categoryAncestors.length !== 0) {
        for (var i = 0; i < categoryAncestors.length; i++) {
          ancestors = ancestors.concat(categoryAncestors[i]);
        }
      }
      ancestors.push(product.category);
      return ancestors;
    },
    getValuesByKey(object, key) {
      var values = [];
      JSON.stringify(object, function(k, v) {
        if (k === key && v.length > 0) {
          console.log(v);
          values.push(v);
        }
        return v;
      });
      return values[0];
    }
  }
};
</script>