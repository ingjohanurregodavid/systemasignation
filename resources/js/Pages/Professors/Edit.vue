<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/vue3';

const props=defineProps({ professors:{type:Object}});
const form=useForm({
    Document:props.professors.Document,
    Names:props.professors.Names,
    Telephone:props.professors.Telephone,
    Email:props.professors.Email,
    Address :props.professors.Address,
    City:props.professors.City,
});
</script>

<template>
    <Head title="Edit Professors" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Professors</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$even=>form.patch(route('Professors.update',professors))"
                        class="mt-6 space y-6 max-w-xl">

                        <InputLabel for="Document" value="Document"></InputLabel>
                        <TextInput id="Document" v-model="form.Document" autofocus required
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Document" class="mt-2"></InputError>

                        <InputLabel for="Names" value="Names"></InputLabel>
                        <TextInput id="Names" v-model="form.Names" autofocus required
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Names" class="mt-2"></InputError>

                        <InputLabel for="Telephone" value="Telephone"></InputLabel>
                        <TextInput id="Telephone" v-model="form.Telephone" autofocus required
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Telephone" class="mt-2"></InputError>

                        <InputLabel for="Email" value="Email"></InputLabel>
                        <TextInput id="Email" v-model="form.Email" autofocus required
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Email" class="mt-2"></InputError>

                        <InputLabel for="Address" value="Address"></InputLabel>
                        <TextInput id="Address" v-model="form.Address " autofocus required
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.Address " class="mt-2"></InputError>

                        <InputLabel for="City" value="City"></InputLabel>
                        <TextInput id="City" v-model="form.City" autofocus required
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputError :message="form.errors.City" class="mt-2"></InputError>

                        <PrimaryButton :disabled="form.processing">
                            <i class="fa-solid fa-save"></i>Save
                        </PrimaryButton>

                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
