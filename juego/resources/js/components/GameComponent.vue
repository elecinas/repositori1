<template>
    <div id="game-component">
        <h1>¡Bienvenido/a {{ player_name }}!</h1>
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
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Dice-1-b.svg/836px-Dice-1-b.svg.png"
                />
                <img
                    class="dice p-2"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Dice-2-b.svg/836px-Dice-2-b.svg.png"
                />
                <!--
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
        <div class="botones btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-dark">
                Lanzar dados
            </button>
            <button type="button" class="btn btn-outline-dark">
                Salir del juego
            </button>
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
            <button type="button" class="btn btn-outline-dark">
                Eliminar partidas
            </button>
            <h4>Porcentaje de éxitos</h4>
            <p>22%</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "game-component",
    data() {
        return {
            player_name: localStorage.getItem("player_name"),
            player_id: localStorage.getItem("player_id"),
            rolls: [],
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
    },

    methods:{
        //
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

.tablero-juego {
    border-radius: 15px;
    background-color: white;
    border: black 2px solid;
    height: 10rem;
    width: 20rem;
}

h1,
.tablero-juego {
    margin-bottom: 1rem;
}

button {
    margin-bottom: 2rem;
}
</style>
