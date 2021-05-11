<template>
  <div>
    <form-component @new="addCard"></form-component>
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
  components: {
    "card-component": CardComponent,
    "form-component": FormComponent,
  },
  data() {
    return {
      cards: [
        {
          id: 1,
          image:
            "https://img.culturacolectiva.com/content/2016/01/francis-bacon-medium.jpg",
          name: "Francis Bacon",
          description: "Retrato que Lucian Freud hizo sobre Francis Bacon.",
        },
      ],
    };
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
</style>