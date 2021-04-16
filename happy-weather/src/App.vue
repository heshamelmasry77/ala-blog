<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <Dummy :header-name="'Hesham'" :main-paragraph="'hesham is a good man'"/>
  <HelloWorld/>

<!--  <HelloWorld msg="Welcome to Your Vue.js App"/>-->

</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import Dummy from './components/Dummy.vue'
export default {
  name: 'App',
  components: {
    Dummy,
    HelloWorld
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
