<template>
    <div id="game-component">
        <h1>¡Hola {{ player_name }}!</h1>
        <p>Tu porcentaje de éxitos es del {{ player_percentage }}%</p>
        <div
            class="
                tablero-juego
                d-flex
                align-items-center
                justify-content-around
            "
        >
            <div class="dados d-flex justify-content-around">
                <img
                    id="dice_1"
                    class="dice p-2"
                    :src="image1"
                />
                <img
                    id="dice_2"
                    class="dice p-2"
                    :src="img_dice_2"
                />
                <!--
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-1-b.svg.png"
                />
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Dice-2-b.svg/836px-Dice-2-b.svg.png"
                />
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Dice-3-b.svg/1024px-Dice-3-b.svg.png"
                />
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Dice-4-b.svg/557px-Dice-4-b.svg.png"
                />
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Dice-5-b.svg/1200px-Dice-5-b.svg.png"
                />
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Dice-6-b.svg/768px-Dice-6-b.svg.png"
                />
                -->
            </div>
        </div>
        <div class="botones">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group">
                    <button
                        type="button"
                        class="btn btn-dark"
                        v-on:click="onClickRoll()"
                    >
                        Lanzar dados
                    </button>
                </div>
                <div class="btn-group">
                    <button
                        type="button"
                        class="btn btn-dark"
                        v-on:click="onClickDestroy()"
                    >
                        Eliminar partidas
                    </button>
                </div>
                <div class="btn-group">
                    <button
                        type="button"
                        class="btn btn-dark"
                        v-on:click="onClickLogout()"
                    >
                        Salir del juego
                    </button>
                </div>
            </div>
        </div>
        <div class="resultados">
            <h4>Tus resultados</h4>
            <table class="table table-hover table-secondary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Lanzamiento</th>
                        <th scope="col">Dado uno</th>
                        <th scope="col">Dado dos</th>
                        <th scope="col">Total tirada</th>
                        <th scope="col">Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="roll in rolls" :key="roll.id">
                        <th scope="row">{{ roll.id }}</th>
                        <td>{{ roll.created_at }}</td>
                        <td>{{ roll.result_dice_1 }}</td>
                        <td>{{ roll.result_dice_2 }}</td>
                        <td>{{ roll.result_total }}</td>
                        <td v-if="roll.result_total == 7">¡exito!</td>
                        <td v-else>¡fracaso!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "game-component",

    props: {
        //activeUser: { type: Boolean },
        //card: { type: Object },
        //shop: { type: Number || String, default: 1 }, //variable botiga
    },

    data() {
        return {
            player_name: localStorage.getItem("player_name"),
            player_id: localStorage.getItem("player_id"),
            rolls: [], //listado de tiradas del jugador
            player_percentage: "",
            value_dice_1: 1,
            value_dice_2: 1,
            value_total: 1,
            img_dice_1:
                "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-1-b.svg.png",
            img_dice_2:
                "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Dice-2-b.svg/836px-Dice-2-b.svg.png",
        };
    },

    mounted() {
        axios.defaults.headers.common = {
            Authorization: "Bearer " + localStorage.getItem("player_token"),
        };
        axios
            .get("api/players/" + this.player_id + "/games")
            .then((response) => {
                this.rolls = response.data;
                //console.log(this.rolls, 'TIRADAS!!!');
            })
            .catch((err) => {
                console.log(err, ":O");
            });
        axios
            .get("api/players/" + this.player_id + "/percentage")
            .then((response) => {
                this.player_percentage = response.data;
                //console.log(this.player_percentage, 'PORCENTAJE!!!');
            })
            .catch((err) => {
                console.log(err, ":O");
            });
    },

    methods: {
        onClickDestroy() {
            axios
                .delete(`api/players/${this.player_id}/games`)
                .then((response) => {
                    (this.rolls = []), console.log(response);
                    this.$emit("reloadRanking");
                });
        },

        onClickLogout() {
            axios
                .get("api/logout")
                .then((response) => {
                    console.log(response, "LOGOUT!!!");
                    localStorage.clear();
                    this.$emit("logout");
                })
                .catch((err) => {
                    console.log(err, ":O");
                });
        },

        selectDiceValue(value){
            var img = '';
            switch (value) {
                case 1:
                    img = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-1-b.svg.png";
                    break;
                case 2:
                    img = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-2-b.svg.png";
                    break;
                case 3:
                    img = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-3-b.svg.png";
                    break;
                case 4:
                    img = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-4-b.svg.png";
                    break;
                case 5:
                    img = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-5-b.svg.png";
                    break;
                case 6:
                    img = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-6-b.svg.png";
                    break;
            }
            return img;
        },

        onClickRoll() {
            this.value_dice_1 = Math.floor(6 * Math.random() + 1);
            this.value_dice_2 = Math.floor(6 * Math.random() + 1);
            this.value_total = this.value_dice_1 + this.value_dice_2;
            this.img_dice_1 = this.selectDiceValue(this.value_dice_1);
            this.img_dice_2 = this.selectDiceValue(this.value_dice_2);

            console.log(this.img_dice_1, this.img_dice_2, "dados lanzadooos!!!!");
        },

        getImage(img){
            return img;
        },
    },

    computed: {
        image1(){
            return this.img_dice_1;
        }
    }
};
</script>

<style scoped>
.dice {
    width: 80px;
    height: 80px;
}

.dados {
    width: 60%;
}

.botones {
    width: 100%;
    text-align: center;
}

.tablero-juego {
    border-radius: 15px;
    background-color: white;
    border: black 2px solid;
    height: 10rem;
    width: 100%;
}

h1,
.tablero-juego {
    margin-bottom: 1rem;
}

button {
    margin-bottom: 2rem;
}
</style>
