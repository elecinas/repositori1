<template>
  <div id="admin-component">
    <form-component @new="addCard"></form-component>
    
    <div class="d-flex justify-content-center flex-wrap p-2">
      <div class="botones btn-group" role="group" aria-label="Basic example">
          <a href="#" class="btn btn-secondary" v-on:click="onClickOne()">Diamond dreams</a>
          <a href="#" class="btn btn-secondary" v-on:click="onClickTwo()">Aphrodita's soul</a>
          <a href="#" class="btn btn-secondary" v-on:click="onClickThree()">Ocean of luxury</a>
      </div>
    </div>

    <div
      class="d-flex flex-wrap justify-content-between flex-row bd-highlight mb-3"
    >
      <card-component 
      v-for="(card, index) in cards" 
      :key="card.id" 
      :card="card"
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
    };
  },

  mounted() {
    axios.get('api/shops/1/pictures').then((response) =>{
      this.cards = response.data;
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
  },
};
</script>

<style scoped>
.botones {
  margin-bottom: 2rem;
}
</style>