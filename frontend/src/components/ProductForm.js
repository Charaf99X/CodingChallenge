import React, { useState } from 'react';

const ProductForm = ({ onAddProduct }) => {
    const [name, setName] = useState('');
    const [description, setDescription] = useState('');
    const [price, setPrice] = useState('');
    const [image, setImage] = useState(null);

    const handleSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('name', name);
        formData.append('description', description);
        formData.append('price', price);
        if (image) {
            formData.append('image', image);
        }
        onAddProduct(formData);
    };

    return (
        <form onSubmit={handleSubmit}>
            <input type="text" value={name} onChange={(e) => setName(e.target.value)} placeholder="Name" required />
            <textarea value={description} onChange={(e) => setDescription(e.target.value)} placeholder="Description" required />
            <input type="number" value={price} onChange={(e) => setPrice(e.target.value)} placeholder="Price" required />
            <input type="file" onChange={(e) => setImage(e.target.files[0])} />
            <button type="submit">Add Product</button>
        </form>
    );
};

export default ProductForm;
