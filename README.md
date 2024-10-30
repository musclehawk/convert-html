# Overall
- This approach breaks down the problem according to DDD principles, focusing on isolating the logic within entities, value objects, repositories, and services.
- TDD and BDD are reflected by writing tests for each class and the overall behavior of the application.
- The code is modular, maintainable, and adheres to good software engineering practices.

# Domain-Driven Design (DDD) / Structure
- Domain: The core business logic revolves around extracting structured data (tables) from a Wikipedia page and processing it.
- Entities: WikipediaPage.
- Value Objects: URL.
- Repository: WikipediaRepository to handle the scraping and table extraction.
- Service: BrowsershotService for rendering the image.
- Factories: WikipediaTableFactory for handling the table extraction from the page.
- Application Layer: Coordinate the interaction between different domain components.

# Run Application
- composer install
- npm install -g puppeteer
- php src/index.php

# Overview of the Problem and Design
We are tasked with:
- Parsing a Wikipedia URL.
- Identifying tables on the page.
- Extracting numeric values from a column in the table.
- Plotting a graph using those values.
- Saving the graph as an image file.

# Using DDD concept:
- Domain: The core business logic revolves around extracting structured data (tables) from a Wikipedia page and processing it.
- Entities: WikipediaPage, Table, Column, and Graph.
- Value Objects: URL, NumericColumn.
- Repository: WikipediaRepository to handle the scraping and table extraction.
- Service: GraphPlotterService for rendering the image.
- Factories: WikipediaTableFactory for handling the table extraction from the page.
- Application Layer: Coordinate the interaction between different domain components.

# TDD / Run Testing
vendor/bin/phpunit tests/UrlTest.php
