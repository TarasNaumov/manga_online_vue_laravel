<script setup>
import axios from "axios";
import {ref, onMounted} from "vue";

const categories = ref([]);
const selectedCategories = ref([]);

const openCategories = ref({});

onMounted(async () => {
    try {
        const response = await axios.get('/api/v2/categories');
        categories.value = response.data.categories;
        console.log(categories);
    } catch (error) {
        console.error("Error fetching categories:", error);
    }
});

function toggleCategory(id) {
    openCategories.value[id] = !openCategories.value[id];
}

const minYear = ref(1900);
const maxYear = ref(2025);
const minGap = 1;

const handleMinChange = () => {
    const min = Number(minYear.value);
    const max = Number(maxYear.value);

    if (min > max - minGap) {
        minYear.value = max - minGap;
    }
};

const handleMaxChange = () => {
    const min = Number(minYear.value);
    const max = Number(maxYear.value);

    if (max < min + minGap) {
        maxYear.value = min + minGap;
    }
};


</script>

<template>
    <div class="filter">
        <h3 class="filter-title">Filter</h3>
        <div>
            <p class="filter-title">Category</p>
            <div v-for="category in categories" :key="category.id" class="category">
                <strong @click="toggleCategory(category.id)" :title="category.description" class="category-title">
                    {{ category.title }}
                    <span class="arrow" :class="{ open: openCategories[category.id] }"></span>
                </strong>

                <div v-show="openCategories[category.id]" class="subcategories">
                    <div v-for="subcategory in category.subcategories" :key="subcategory.id" class="subcategory" :title="subcategory.description">
                        <input type="checkbox" name="subcategory" :id="'sub-' + subcategory.id" :value="subcategory.id" v-model="selectedCategories">
                        <label :for="'sub-' + subcategory.id">{{ subcategory.title }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="dual-range">
            <p class="filter-title">Year</p>
            <div class="slider-container">
                <input type="range" min="1900" max="2025" step="1" v-model="minYear" @input="handleMinChange" />
                <input type="range" min="1900" max="2025" step="1" v-model="maxYear" @input="handleMaxChange" />
                <div class="range-track"></div>
            </div>
            <div class="year-values">
                <span>From: {{ minYear }}</span>
                <span>To: {{ maxYear }}</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.filter {
    width: 300px;
    padding: 15px;
    background: #2c2c2c;
    color: #ffffff;
    font-family: "Roboto", sans-serif;
}

.filter-title {
    font-size: 18px;
    margin-bottom: 15px;
}

.category {
    margin-bottom: 10px;
}

.category-title {
    position: relative;
    display: block;
    cursor: pointer;
    padding: 5px;
    background: #3a3a3a;
    border-radius: 4px;
}

.category-title:hover {
    background: #505050;
}

.subcategories {
    padding-left: 15px;
    margin-top: 5px;
}

.subcategory {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 5px;
}

.arrow {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 5px;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 6px solid #ffffff;
    transition: transform 0.3s;
}

.arrow.open {
    transform: translateY(-50%) rotate(180deg);
}

.dual-range {
    width: 100%;
    font-family: "Roboto", sans-serif;
    color: #fff;
}

.slider-container {
    position: relative;
    width: 100%;
    height: 6px;
    margin: 20px 0;
}

input[type=range] {
    position: absolute;
    width: 100%;
    pointer-events: none; /* щоб не блокувати другий слайдер */
    -webkit-appearance: none;
    background: transparent;
    z-index: 3;
}

input[type=range]::-webkit-slider-thumb {
    pointer-events: all; /* щоб можна було тягнути */
    -webkit-appearance: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ffb700;
    cursor: pointer;
    border: none;
    margin-top: -5px;
}

.range-track {
    position: absolute;
    height: 6px;
    background: #444;
    width: 100%;
    top: 0;
    border-radius: 3px;
}

.year-values {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
}
</style>
