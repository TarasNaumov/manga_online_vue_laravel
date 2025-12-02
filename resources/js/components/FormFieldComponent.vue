<script setup>
import { defineComponent } from "vue";

const props = defineProps({
    id: { type: String, required: true },
    name: { type: String, required: true },
    label: { type: String, required: true },
    type: { type: String, required: true },
    placeholder: { type: String, required: false },
})
</script>

<template>
    <div>
        <label :for="props.id">{{ props.label }}</label>
        <input :type="props.type" :name="props.name" :placeholder="props.placeholder" :id="props.id">
    </div>
</template>
