<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=x, initial-scale=1.0">
    <title>Lấy dữ liệu từ CheckBox</title>
</head>

<body>
    <style>
        fieldset {
            width: 50%;
            margin: 0 auto;
            border: 2px solid palevioletred;
            border-radius: 1em;
            position: relative;
        }

        legend {
            margin: 0 auto;
            font-size: 2em;
            font-weight: bold;
            color: #45a049;

        }

        #rule {
            width: 90%;
            height: 200px;
            margin: 10px auto;
            overflow-y: auto;
            border: 1px groove #aa7a7a;
            padding: 10px;
        }

        label {
            user-select: none;
        }

        input {
            margin-left: 3%;
        }

        input:checked {
            accent-color: #4CAF50;
            caret-color: red;
        }

        button {
            padding: 5px 10px;
            position: absolute;
            right: 5%;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 0.2em;
            cursor: pointer;
            transition: all 0.3s;
        }

        button:hover {
            background-color: #45a049;
            border-radius: 1em;
            box-shadow: 0 0 5px 2px #4CAF50;
        }
    </style>

    <form action="rules.php" method="post">
        <fieldset>
            <legend>Rules</legend>

            <p id="rule">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum non inventore maxime. Aliquid molestias blanditiis quas libero, repudiandae laborum quis temporibus adipisci. Vitae commodi, numquam cupiditate delectus, eaque quam culpa omnis incidunt recusandae fugiat sapiente ut possimus itaque ipsa totam ipsum id asperiores error illo in alias perferendis tempora. Nostrum alias, earum suscipit nemo voluptate delectus tempora voluptatem nam voluptates nihil sit non atque architecto quibusdam. Ad labore minima quia perferendis repudiandae, eum quibusdam corrupti harum adipisci placeat fugiat? Excepturi eius ex dolorem ipsum cupiditate vero cum nobis quis earum qui in enim fuga vitae aut, fugiat pariatur ipsam totam. Modi corporis optio, autem explicabo voluptate eveniet ipsam eaque ipsum consectetur delectus minus! Quam, minima magni unde rerum iure perferendis ullam eius voluptates doloribus mollitia molestiae a eos hic? Sapiente atque deleniti voluptatem! Ab ducimus ratione eos aut quaerat quidem nisi vel id sint illum esse labore laboriosam soluta illo odio, iste dolorem nemo. Omnis nulla nihil harum qui provident. Repellendus porro nesciunt inventore corporis, enim eligendi ea nihil error nobis temporibus voluptas consequatur totam doloremque nostrum itaque perspiciatis doloribus. Doloremque facilis harum natus tempora quis! Debitis, voluptatem laborum, deserunt ex corporis laudantium explicabo maxime rerum nam dicta veniam suscipit minima officia neque quasi modi quae quo minus perferendis! Repellendus architecto modi, explicabo, repellat reprehenderit perspiciatis corrupti in totam nulla neque temporibus aliquid ipsum earum aliquam quae quaerat unde ducimus similique beatae nobis eum, quo sequi? Voluptas, temporibus suscipit itaque commodi, quidem saepe, eaque expedita delectus voluptatum minima porro odit harum rem eius. Est ut rem minus at magnam odit ab molestias quae nulla ea sed excepturi ipsa aliquam soluta, exercitationem maiores vitae, animi quod voluptatem fuga consequuntur illo nihil impedit nostrum. Similique doloribus recusandae quas minus itaque maxime cupiditate. Aperiam, ut similique officiis impedit provident doloribus dicta voluptatibus nobis vitae culpa deleniti, vero vel assumenda pariatur placeat hic? At obcaecati voluptatum, nostrum dolorum, ducimus sapiente harum ea error provident voluptates vitae officiis, maxime facere quos ipsum asperiores. Repellat assumenda sed perspiciatis inventore vel, veniam ab! Quasi quaerat exercitationem fugit beatae iusto ipsam fugiat eaque repudiandae, at aliquid, animi sit sapiente aperiam tenetur unde illum aspernatur magni ipsum saepe quo facilis? Illo, fugiat! Soluta laborum eius quod. Vel, animi saepe! Amet dolor deleniti reiciendis temporibus aliquam quibusdam non molestiae laudantium ex quo magni consequuntur animi quae voluptatum, magnam, nisi dignissimos exercitationem sit incidunt suscipit nostrum deserunt! Neque, eos, atque, unde fugit consectetur aliquid porro ratione tempora officia sequi ut quia quis quod qui. Error, odit dolore corporis quod exercitationem repellendus, unde fuga natus quis deserunt fugiat itaque? Iste omnis iure suscipit est. Esse incidunt odio aut corporis enim. Omnis eaque debitis, cupiditate praesentium quis ullam cum dolorum illo eius ducimus architecto exercitationem, alias maxime facilis dignissimos reprehenderit perferendis voluptatum reiciendis quibusdam laboriosam hic quia. Incidunt, dolor quia dolore placeat temporibus iste rerum non minima esse cumque quaerat culpa harum velit, maiores tempore? Recusandae perspiciatis, ipsum minus iste dicta nulla expedita ipsam voluptatum aut placeat sapiente repellat illo rem itaque explicabo.
            </p>
            <p><b>Bạn có đồng ý với điều khoản của chúng tôi?</b></p>
            <br>

            <input type="checkbox" id="rules" name="rules" value="yes">
            <label for="rules">Tôi đồng ý</label>

            <button type="submit" name="btn_rules" value="submit_rules">Register</button>
        </fieldset>
    </form>
</body>

</html>