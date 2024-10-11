import React from 'react';

const ProductList = ({ products, onDeleteProduct }) => {
    return (
        <ul>
            {products.map(product => (
                <li key={product.id}>
                    <img src={`http://localhost:8000/storage/${product.image}`} alt={product.name} style={{ width: '100px' }} />
                    {product.name} - ${product.price}
                    <button onClick={() => onDeleteProduct(product.id)}>Delete</button>
                </li>
            ))}
        </ul>
    );
};

export default ProductList;
