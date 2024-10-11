import React, { useEffect, useState } from 'react';

const CategoryFilter = ({ onSelectCategory }) => {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        fetch('http://localhost:8000/api/categories')
            .then(response => response.json())
            .then(data => setCategories(data));
    }, []);

    return (
        <select onChange={(e) => onSelectCategory(e.target.value)}>
            <option value="">All Categories</option>
            {categories.map(category => (
                <option key={category.id} value={category.id}>
                    {category.name}
                </option>
            ))}
        </select>
    );
};

export default CategoryFilter;
