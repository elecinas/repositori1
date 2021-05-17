<template>
  <div id="admin-component">
    <form-component :shop="shop" @new="addCard"></form-component>
    <div class="d-flex justify-content-center flex-wrap p-2">
      <div class="botones btn-group" role="group" aria-label="Basic example">
          <a 
          v-for="tienda in tiendas" 
          :key="tienda.id"
          href="#" 
          class="btn btn-secondary" 
          v-on:click="onClickShop(tienda.id)">{{ tienda.name }}</a>
      </div>
    </div>
    <div class="d-flex flex-wrap justify-content-between flex-row bd-highlight mb-3">
      <card-component 
      v-for="(card, index) in cards" 
      :key="card.id" 
      :card="card"
      :shop="shop"
      @update="updateCard(index)"
      @delete="deleteCard(index)">
      <!-- @update="updateCard(index, ...arguments)" -->
      </card-component>
    </div>
  </div>
</template>

<script>
import CardComponent from "./CardComponent";
import FormComponent from "./FormComponent";

export default {
  name: 'admin-component',
  components: {
    "card-component": CardComponent,
    "form-component": FormComponent,
  },
  data() {
    return {
      cards: [],
      shop: '1',// id de la tienda de la que se desean ver los cuadros
      tiendas: [],//recibe todas las tiendas
    };
  },

  mounted() {
    axios.get('api/shops/' + this.shop + '/pictures').then((response) =>{
      this.cards = response.data;
    });
    axios.get('api/shops').then((response) =>{
      this.tiendas = response.data;
    });
  },

  methods: {
    addCard(card) {
      this.cards.push(card);
    },
    updateCard(index, card) {
      this.cards[index] = card;
    },
    deleteCard(index) {
      this.cards.splice(index, 1);
    },
    onClickShop(num) {//establim el id de la botiga escollida
      this.shop = num;
      axios.get('api/shops/' + this.shop + '/pictures').then((response) =>{
      this.cards = response.data;
    });
    }
  },
};
</script>

<style scoped>
.botones {
  margin-bottom: 2rem;
}
</style>