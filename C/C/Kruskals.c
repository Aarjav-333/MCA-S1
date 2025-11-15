#include <stdio.h>
#include <stdlib.h>

// Define maximum number of vertices
#define V 5 
// Maximum number of edges in a simple undirected graph is V * (V - 1) / 2
#define MAX_E (V * (V - 1) / 2) 

// Structure to represent an edge
struct Edge {
    int src, dest, weight;
};

// Structure for DSU (Union-Find)
struct Subset {
    int parent;
    int rank;
};

// --- DSU (Union-Find) Functions ---

int find(struct Subset subsets[], int i) {
    if (subsets[i].parent != i)
        subsets[i].parent = find(subsets, subsets[i].parent);
    return subsets[i].parent;
}

void Union(struct Subset subsets[], int x, int y) {
    int xroot = find(subsets, x);
    int yroot = find(subsets, y);

    if (subsets[xroot].rank < subsets[yroot].rank)
        subsets[xroot].parent = yroot;
    else if (subsets[xroot].rank > subsets[yroot].rank)
        subsets[yroot].parent = xroot;
    else {
        subsets[yroot].parent = xroot;
        subsets[xroot].rank++;
    }
}

// --- Priority Queue Simulation (Sorting) ---

int compareEdges(const void* a, const void* b) {
    return ((struct Edge*)a)->weight - ((struct Edge*)b)->weight;
}

// --- Edge Extraction Function ---

int extractEdges(int graph[V][V], struct Edge edges[]) {
    int edge_count = 0;
    // Iterate over the upper triangle of the symmetric matrix only to avoid duplicates
    for (int i = 0; i < V; i++) {
        for (int j = i + 1; j < V; j++) {
            if (graph[i][j] != 0) {
                edges[edge_count].src = i;
                edges[edge_count].dest = j;
                edges[edge_count].weight = graph[i][j];
                edge_count++;
            }
        }
    }
    return edge_count;
}

// --- Kruskal's Algorithm Function ---

void KruskalMST(int graph[V][V]) {
    // 1. Convert Adjacency Matrix to Edge List
    struct Edge all_edges[MAX_E];
    int total_edges = extractEdges(graph, all_edges);
    
    // 2. Sort all edges by weight (Priority Queue simulation)
    qsort(all_edges, total_edges, sizeof(struct Edge), compareEdges);

    struct Subset* subsets = (struct Subset*)malloc(V * sizeof(struct Subset));
    for (int v = 0; v < V; v++) {
        subsets[v].parent = v;
        subsets[v].rank = 0;
    }

    struct Edge resultMST[V - 1];
    int edgeCount = 0;
    int i = 0;

    printf("Edges in the constructed MST:\n");
    
    // 3. Iterate through sorted edges and build MST
    while (edgeCount < V - 1 && i < total_edges) {
        struct Edge next_edge = all_edges[i++];

        int x = find(subsets, next_edge.src);
        int y = find(subsets, next_edge.dest);

        // Check for Cycle
        if (x != y) {
            resultMST[edgeCount++] = next_edge;
            Union(subsets, x, y);
            
            printf("%d -- %d \t(Weight: %d)\n", next_edge.src, next_edge.dest, next_edge.weight);
        }
    }

    // 4. Calculate Total Weight
    int totalWeight = 0;
    for (i = 0; i < V - 1; i++) {
        totalWeight += resultMST[i].weight;
    }
    printf("\nTotal Weight of MST: %d\n", totalWeight);
    
    free(subsets);
}

// --- Driver Program ---

int main() {
    // The adjacency matrix is now the parameter passed to KruskalMST
    int graph[V][V] = {
        {0, 2, 0, 6, 0},
        {2, 0, 3, 8, 5},
        {0, 3, 0, 0, 7},
        {6, 8, 0, 0, 9},
        {0, 5, 7, 9, 0}
    };
    
    printf("Kruskal's Algorithm using Adjacency Matrix Input (V=%d)\n\n", V);
    KruskalMST(graph);
    
    return 0;
}