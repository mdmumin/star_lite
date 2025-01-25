<template>
    <div class="w-50 mx-auto">
        <form class="card p-2 my-3" @submit.prevent="BlogFormSubmit">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control"
                     id="title"
                    aria-describedby="emailHelp"
                    name="title"
                />

                <p v-if="title_error_message" class="alert alert-danger">
                    {{ title_error_message }}
                </p>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                    >Description</label
                >
                <textarea
                    class="form-control"
                     id="short_description"
                    name="short_description"
                ></textarea>
                <p v-if="title_error_message" class="alert alert-danger">
                    {{ short_description }}
                </p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                    >Image</label
                >
                <input type="file" name="cover_image" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            count: 0,
            title_error_message: null,
            short_description: null,
        };
    },
    methods: {
        BlogFormSubmit: async function (event) {
            this.empty_error();
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            let formData = new FormData(event.target);
            formData.append("_csrf", csrfToken);

            console.log(formData.data);
            try {
                let result = await axios.post("api/v1/blog/store", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        // Authorization: "Bearer your_token_here", // Example of adding an authorization token
                    },
                });
                console.log("response", result.data); // Corrected 'respose' -> 'response' and used 'result.data'
            } catch (error) {
                // Error handling
                if (error.response) {
                    // Server responded with a status other than 2xx
                    // console.error("Error response:", error.response.data);
                    // console.error("Status code:", error.response.status);
                    //  console.error("Headers:", error.response.headers);

                    let validationErr = error.response.data.errors;

                    if (validationErr) {
                        console.log(validationErr.title);
                        this.title_error_message = validationErr.title[0];
                        this.short_description =
                            validationErr.short_description[0];
                    }
                } else if (error.request) {
                    // Request was made but no response received
                    // console.error("No response received:", error.request);
                } else {
                    // Something happened while setting up the request
                    // console.error("Error setting up request:", error.message);
                }
                // console.error("Full error:", error);
            }
        },

        empty_error: function () {
            this.title_error_message = null;
            this.short_description = null;
        },
    },
};
</script>

<style scoped></style>
