UPDATE employees
SET employees.salary = (
	SELECT adjusted_salary
	FROM (
		SELECT employees.id AS id, (employees.salary + (employees.salary * adjustments.adjustment / 100)) AS adjusted_salary
		FROM employees
		INNER JOIN (
			SELECT continents.anual_adjustment AS adjustment, countries.id AS country
			FROM continents
			INNER JOIN countries ON countries.continent_id = continents.id
		) AS adjustments ON employees.country_id = adjustments.country
        WHERE employees.salary <= 5000
	) AS adjusted_salaries
	WHERE employees.id = adjusted_salaries.id
)
WHERE employees.salary <= 5000