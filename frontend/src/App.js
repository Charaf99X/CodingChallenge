import React, { useEffect, useState, useCallback } from 'react';
import { BrowserRouter as Router } from 'react-router-dom';
import ProductForm from './components/ProductForm';
import ProductList from './components/ProductList';
import Pagination from './components/Pagination';
import CategoryFilter from './components/CategoryFilter';
import DynamicRoutes from './components/DynamicRoutes';

const App = () => {
    const [products, setProducts] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(1);
    const [sortBy, setSortBy] = useState('name');
    const [sortOrder, setSortOrder] = useState('asc');
    const [selectedCategory, setSelectedCategory] = useState(null);

    const fetchProducts = useCallback(() => {
        const url = `http://localhost:8000/api/products?page=${currentPage}&sort_by=${sortBy}&sort_order=${sortOrder}${selectedCategory ? `&category_id=${selectedCategory}` : ''}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                setProducts(data.data);
                setTotalPages(data.last_page);
            });
    }, [currentPage, sortBy, sortOrder, selectedCategory]);

    useEffect(() => {
        fetchProducts();
    }, [fetchProducts]);

    const addProduct = (productData) => {
        fetch('http://localhost:8000/api/products', {
            method: 'POST',
            body: productData,
        })
            .then(response => response.json())
            .then(newProduct => {
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

    const handleSort = (field) => {
        setSortBy(field);
        setSortOrder(sortOrder === 'asc' ? 'desc' : 'asc');
    };

    return (
        <Router>
            <div>
                <h1>Product Management</h1>
                <ProductForm onAddProduct={addProduct} />
                <CategoryFilter onSelectCategory={setSelectedCategory} />
                <ProductList 
                    products={products} 
                    onDeleteProduct={handleDelete} 
                    onSort={handleSort}
                    sortBy={sortBy}
                    sortOrder={sortOrder}
                />
                <Pagination 
                    currentPage={currentPage} 
                    totalPages={totalPages} 
                    onPageChange={setCurrentPage} 
                />
                <DynamicRoutes />
            </div>
        </Router>
    );
};

export default App;
