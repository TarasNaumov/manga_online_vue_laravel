<template>
    <div>
        <div v-for="category in categories" :key="category.id">
            <div>{{ category.title }}</div>
            <div>{{ category.description }}</div>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue'
import axios from 'axios'

const categories = ref([])

onMounted(async () => {
    try {
        const response = await axios.get('/api/v2/categories')
        categories.value = response.data.categories
    } catch (e) {
        console.log(e)
    }
})
</script>

