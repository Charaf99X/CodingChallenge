import React, { useEffect, useState } from 'react';
import ProductForm from './components/ProductForm';
import ProductList from './components/ProductList';

const App = () => {
    const [products, setProducts] = useState([]);

    // Fetch products when the component mounts
    useEffect(() => {
        fetch('http://localhost:8000/api/products')
            .then(response => response.json())
            .then(data => setProducts(data));
    }, []);

    // Function to handle adding a new product
    const addProduct = (productData) => {
        fetch('http://localhost:8000/api/products', {
            method: 'POST',
            body: productData,
        })
            .then(response => response.json())
            .then(newProduct => {
                // Update the products state to include the new product
                setProducts(prevProducts => [...prevProducts, newProduct]);
            })
            .catch(error => console.error('Error adding product:', error));
    };

    const handleDelete = (id) => {
        fetch(`http://localhost:8000/api/products/${id}`, {
            method: 'DELETE',
        })
            .then(() => setProducts(products.filter(product => product.id !== id)))
            .catch(error => console.error('Error deleting product:', error));
    };

    return (
        <div>
            <h1>Product Management</h1>
            <ProductForm onAddProduct={addProduct} />
            <ProductList products={products} onDeleteProduct={handleDelete} />
        </div>
    );
};

export default App;
