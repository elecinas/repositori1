<template>
    <div id="admin-component">
        <game-component
            v-if="activeUser"
            @logout="falseActiveUser"
            @reloadRanking="recallRanking"
        />
        <div v-else>
            <div class="row">
                <form-component @new="loginUser" />
                <form-component2 @new="registerUser" />
            </div>
            <div class="table_pack">
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
                            <th scope="row">{{ player.id }}</th>
                            <td>{{ player.name }}</td>
                            <td>{{ player.percentage }}%</td>
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
    data() {
        return {
            activeUser: false,
            players: [],
        };
    },

    mounted() {
        //localStorage.clear();
        //this.activeUser = false;
        /**
         * comprobamos que existe un token  para que la sesión de usuario siga activa
         */
        if (localStorage.getItem("player_token")) {
            //colocamos el bearer token
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("player_token"),
            };
            //refresca el token
            axios
                .post("api/refresh/")
                .then((response) => {
                    console.log(response.data.token, "RETOKENNNN");
                    if (response.data.success) {
                        localStorage.setItem("player_token", response.data.token);
                    } else {
                        localStorage.clear();
                        this.activeUser = false;
                    }
                });
        } else {
            this.activeUser = false;
        }
        /**al salir del navegador se limpia localStorage */ /*
        window.addEventListener("beforeunload", function (event) {
            localStorage.clear();
        });
        */
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
        loginUser(user) {
            this.activeUser = true;
            localStorage.setItem("player_name", user.user.name);
            localStorage.setItem("player_id", user.user.id);
            localStorage.setItem("player_token", user.token);
        },

        registerUser(user) {
            this.activeUser = true;
            localStorage.setItem("player_name", user.user.name);
            localStorage.setItem("player_id", user.user.id);
            localStorage.setItem("player_token", user.token);
            //actualizamos la tabla de rankings para que se vea el nuevo usuario
            axios
                .get("api/players/ranking")
                .then((response) => {
                    this.players = response.data;
                })
                .catch((err) => {
                    console.log(err, ":O");
                });
        },

        //Llamamos a esta función cuando se hace logout desde GameComponent
        falseActiveUser() {
            this.activeUser = false;
        },

        //Llamamos a esta función al vaciar los registros de un jugador desde GameComponent
        //actualiza el ranking
        recallRanking() {
            axios
                .get("api/players/ranking")
                .then((response) => {
                    this.players = response.data;
                })
                .catch((err) => {
                    console.log(err, ":O");
                });
        },
    },
};
</script>

<style scoped>
.table_pack {
    margin-top: 2rem;
    margin-bottom: -2rem;
}
</style>
