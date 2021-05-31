<template>
    <div id="admin-component">
        <game-component v-if="activeUser"/>
        <div v-else>
            <div class="row">
                <form-component @new="loginUser" /><!-- minuto 32:19 del vídeo -->
                <form-component2 @new="registerUser" />
            </div>
            <div class="table">
            <h4>Resultados de todos los jugadores</h4>
            <table class="table table-hover table-secondary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre jugador</th>
                        <th scope="col">Porcentaje de éxito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in players" :key="player.id">
                        <th scope="row">{{player.id}}</th>
                        <td>{{player.name}}</td>
                        <td>{{player.percentage}}%</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</template>

<script>
import GameComponent from "./GameComponent";
import FormComponent from "./FormComponent";
import FormComponent2 from "./FormComponent2";

export default {
    name: "admin-component",
    components: {
        "game-component": GameComponent,
        "form-component": FormComponent,
        "form-component2": FormComponent2,
    },
    data(){
        return {
            activeUser: false,
            players: []
        }
    },

    mounted(){
        axios
        .get("api/players/ranking")
        .then((response) => {
            this.players = response.data;
        })
        .catch((err) => {
        console.log(err, ":O");
        });
    },

    methods: {
        
        loginUser(user){
            this.activeUser = true;
        },

        registerUser(user){
            this.activeUser = true;
        }
    }
};
</script>

<style scoped></style>
