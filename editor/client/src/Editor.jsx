import { Client, Provider, cacheExchange, fetchExchange, gql, useQuery } from 'urql';

const client = new Client({
    url: document.getElementById('app').getAttribute('data-endpoint'),
    exchanges: [cacheExchange, fetchExchange],
});

const TodosQuery = gql`
    query {
        widgetDefinitions {
            id
            name
        }
    }
`;

export function Editor() {
    return (
        <Provider value={client}>
            <WidgetsDefinitions />

            <iframe src={document.getElementById('app').getAttribute('data-front')} width="100%" height={700}>

            </iframe>
        </Provider>
    )
}

function WidgetsDefinitions() {
    const [result, reexecuteQuery] = useQuery({
        query: TodosQuery,
    });

    const { data, fetching, error } = result;

    if (fetching) return <p>Loading...</p>;
    if (error) return <p>Oh no... {error.message}</p>;
    
    return (
        <div className="editor">
            {data.widgetDefinitions.map((widget) => widget.name)}
        </div>
    )
}