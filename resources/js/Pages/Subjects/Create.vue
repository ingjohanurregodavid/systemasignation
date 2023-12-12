<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head,useForm } from '@inertiajs/vue3';

const form=useForm({
    Names:'',
    Description:'',
    Credits:'',
    Specialization :'',
    Mandatory:false,
});
</script>

<template>
    <Head title="Create Subjects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Subjects</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$even=>form.post(route('Subjects.store'))"
                        class="mt-6 space y-6 max-w-xl">

                        <InputLabel for="Names" value="Names"></InputLabel>
                        <TextInput id="Names" v-model="form.Names" 
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Names" class="mt-2"></InputError>

                        <InputLabel for="Description" value="Description"></InputLabel>
                        <TextInput id="Description" v-model="form.Description" 
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Description" class="mt-2"></InputError>

                        <InputLabel for="Credits" value="Credits"></InputLabel>
                        <TextInput id="Credits" v-model="form.Credits" 
                        type="number"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Credits" class="mt-2"></InputError>

                        <InputLabel for="Specialization" value="Specialization"></InputLabel>
                        <TextInput id="Specialization" v-model="form.Specialization" 
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Specialization" class="mt-2"></InputError>

                        <InputLabel for="Mandatory" value="Mandatory"></InputLabel>
                        <Checkbox id="Mandatory" v-model="form.Mandatory" 
                        type="checkbox"></Checkbox>
                        <InputError :message="form.errors.Mandatory" class="mt-2"></InputError>

                        <PrimaryButton :disabled="form.processing">
                            <i class="fa-solid fa-save"></i>Save
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
