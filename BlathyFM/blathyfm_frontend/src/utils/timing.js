/*   a zene komponenseknél (lej. lista, lej. zenék) majd kelleni fog az időpont, azt fogja majd kiszámítani
     pl. (12:30 => 12:32) */
export function stepForward(currentMinute, length) {
    const newTime = toSecondHour(currentMinute) + toSecond(length)
    for (let x = 0; x < borders.length; x++) {
        if (newTime > toSecondHour(borders[x][1])) {
            let y = x + 1
            if (y >= borders.length) y = 0
            return borders[y][0]
        }
    }
    return toTime(newTime)
}

// időhatárok, amiken nem szabad átívelni a szünetek tartása érdekében
const borders = [["9:40", "9:55"], ["12:30", "12:55"]]

// ezek számításához kellő függvény (12:30 => 2 593 800)
export function toSecondHour(appointment) {
    try {
        const parts = appointment.split(":")
        const hour = parseInt(parts[0])
        const minute = parseInt(parts[1])
        return (hour * 3600) + (minute * 60)
    } catch {
        return 0
    }
}

// kiíráshoz vissza az időpontot (2 593 800 => 12:30)
export function toTime(appointmentInSecond) {
    const totalMinutes = Math.floor(appointmentInSecond / 60)
    const hour = Math.floor(totalMinutes / 60)
    const minute = totalMinutes % 60
    return `${hour}:${digit2(minute)}`
}

// hogy lehessen a hosszal számolni (5:00 => 360)
export function toSecond(length) {
    try {
        let minute = length.split(":")
        const second = parseInt(minute[1])
        minute = parseInt(minute[0])
        return (minute * 60) + second
    }
    catch {
        return 0
    }
}

// 5:6 helyett 5:06 stb
function digit2(num) {
    return Math.abs(num) < 10 ? `0${num}` : `${num}`
}