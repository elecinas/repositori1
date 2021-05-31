<template>
    <div id="game-component">
        <h1>activeUser</h1>
        <div class="tablero-juego d-flex align-items-center justify-content-around">
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
        <button type="button" class="btn btn-dark">Lanzar dados</button>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>2021-05-31 12:44:47</td>
                        <td>2</td>
                        <td>5</td>
                        <td>7</td>
                        <td>¡Exito!</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>2021-05-12 10:34:09</td>
                        <td>3</td>
                        <td>3</td>
                        <td>6</td>
                        <td>Fracaso</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>2021-06-12 08:12:45</td>
                        <td>6</td>
                        <td>5</td>
                        <td>11</td>
                        <td>Fracaso</td>
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
