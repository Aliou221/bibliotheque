<tr>
    <td class="px-4 py-3 font-semibold text-[.8rem]">{{ $titre }}</td>
    <td class="px-4 py-3 text-[.8rem]">{{ $auteur }}</td>
    <td class="px-4 py-3 text-[.8rem]">{{ $usager }}</td>
    <td class="px-4 py-3 text-[.8rem]">{{ $date }}</td>
    {!!
        e($statut) == true ? 
            '<td class="px-4 py-3 text-[.8rem] text-green-600 font-bold">
                <span class="px-3 py-[3px] rounded-2xl bg-green-100 inline-block">
                    Retourné
                </span>
            </td>' : 
            '<td class="px-4 py-3 text-[.8rem] text-red-600 font-bold">
                <span class="px-3 py-[3px] rounded-2xl bg-red-100 inline-block">En cours</span>
            </td>'

        ;
    !!}

    {!! 
        e($populaire) == true ? '<td class="px-4 py-3 text-[.8rem]">' . e($total) . '</td>' : ''  
    !!}
</tr>