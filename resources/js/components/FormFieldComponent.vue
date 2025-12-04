<script setup>
import { defineEmits } from "vue";
import { Field, ErrorMessage } from "vee-validate"

const props = defineProps({
    id: { type: String, required: true },
    name: { type: String, required: true },
    label: { type: String, required: true },
    type: { type: String, required: true },
    placeholder: { type: String, required: false },
})

</script>

<template>
    <div class="formField">
        <label :for="props.id">{{ props.label }}</label>
        <Field :type="props.type" :name="props.name" :placeholder="props.placeholder" :id="props.id" />
        <ErrorMessage :name="name" class="error" />
    </div>
</template>
