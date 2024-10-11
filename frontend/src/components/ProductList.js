import React from 'react';

const ProductList = ({ products, onDeleteProduct, onSort, sortBy, sortOrder }) => {
    return (
        <div>
            <table>
                <thead>
                    <tr>
                        <th onClick={() => onSort('name')}>
                            Name {sortBy === 'name' && (sortOrder === 'asc' ? '▲' : '▼')}
                        </th>
                        <th onClick={() => onSort('price')}>
                            Price {sortBy === 'price' && (sortOrder === 'asc' ? '▲' : '▼')}
                        </th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {products.map(product => (
                        <tr key={product.id}>
                            <td>{product.name}</td>
                            <td>${product.price}</td>
                            <td>
                                <img src={`http://localhost:8000/storage/${product.image}`} alt={product.name} style={{ width: '100px' }} />
                            </td>
                            <td>
                                <button onClick={() => onDeleteProduct(product.id)}>Delete</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default ProductList;
