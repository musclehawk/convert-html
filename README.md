# convert-html
Convert Html content

Make the script executable:

# docker-php-sample

# Run docker php image
docker compose up -d

# Run file hello world
docker run -it convert-html-php php src/index.php

# Overview of the Problem and Design
We are tasked with:
- Parsing a Wikipedia URL.
- Identifying tables on the page.
- Extracting numeric values from a column in the table.
- Plotting a graph using those values.
- Saving the graph as an image file.
# Using DDD:
- Domain: The core business logic revolves around extracting structured data (tables) from a Wikipedia page and processing it.
- Entities: WikipediaPage, Table, Column, and Graph.
- Value Objects: URL, NumericColumn.
- Repository: WikipediaRepository to handle the scraping and table extraction.
- Service: GraphPlotterService for rendering the image.
- Factories: WikipediaTableFactory for handling the table extraction from the page.
- Application Layer: Coordinate the interaction between different domain components.
# Structure:
- Entities: WikipediaPage, Table, Column.
- Services: GraphPlotterService.
- Value Objects: URL, NumericColumn.
- Repositories: WikipediaRepository.
- Factory: WikipediaTableFactory.
